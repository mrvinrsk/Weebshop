// outsource the generating of headers and footers to a function
function generateHeaderFooter(longest, add, headerText, filler) {
    let header = " " + headerText + " ";
    let footer = "";

    while (header.length < longest + add) {
        header = filler + header + filler;
    }
    for (let i = 0; i < header.length; i++) {
        footer += filler;
    }

    return [header, footer];
}

function getLongestLength(list) {
    let longest = 0;
    for (let i = 0; i < list.length; i++) {
        if (list[i].length > longest) {
            longest = list[i].length;
        }
    }
    return longest;
}

const toast_defaults = {
    id: null,
    title: 'Toast',
    content: 'This is a toast',
    buttons: [],
    onClose: null,
    onMouseEnter: null,
    onMouseLeave: null,
    autoClose: {
        enabled: true,
        delay: 3000,
        showProgress: true,
        autoAdjust: {
            enabled: true,
            onlyWhenDelayTooShort: true,
            extraTime: 0
        }
    },
    closeButton: true,
    unsafe: false,
    ignoreWarnings: false,
    debug: false
}

function untoasted(options = toast_defaults) {
    let warnings = [];
    let debug = [];
    let toast_timeout = null;

    // if options contains an id, save it to a variable, otherwise randomly generate one with 7 characters
    let toast_id = options.id ? options.id : Math.random().toString(36).substring(2, 7);

    // if a toast with the same id already exists, count how many there are and append the count to the id
    if (document.getElementById(toast_id)) {
        let toast_count = document.querySelectorAll(`[id^="${toast_id}"]`).length + 1;
        toast_id += `_${toast_count}`;

        warnings.push(`A toast with the id "${options.id}" already exists. The new toast got the id "${toast_id}" instead.`);
    }

    // if options doesn't contain every key in toast_defaults, add it with the default value
    // do the same for every sub-object
    for (let key in toast_defaults) {
        if (!options.hasOwnProperty(key)) {
            options[key] = toast_defaults[key];
        } else if (typeof options[key] === 'object') {
            for (let subkey in toast_defaults[key]) {
                if (!options[key].hasOwnProperty(subkey)) {
                    options[key][subkey] = toast_defaults[key][subkey];
                }
            }
        }
    }

    debug.push("Creating toast with options: ", options);

    // get, if it exists, otherwise create the toast-wrapper element
    const wrapper = document.querySelector('.toasted-wrapper') || document.createElement('div');
    wrapper.classList.add('toasted-wrapper');

    // add the wrapper to the body if it doesn't exist
    if (!document.getElementById(".toasted-wrapper")) {
        document.body.appendChild(wrapper);
    }

    // create the toast element
    const toast = document.createElement('div');
    toast.classList.add('toast');
    toast.id = toast_id;

    // create the toast title element
    const title = document.createElement('div');
    title.classList.add('toast-title');
    title.innerText = options.title;

    // create the toast content element
    const content = document.createElement('div');
    content.classList.add('toast-content');
    content.innerHTML = options.content;

    // create the toast buttons element
    const buttons = document.createElement('div');
    buttons.classList.add('toast-buttons');

    // create the toast buttons
    options.buttons.forEach(button => {
        const btn = document.createElement('button');
        btn.classList.add('toast-button');
        btn.innerText = button.text;
        button.classes.split(' ').forEach(clazz => {
            btn.classList.add(clazz);
        });

        if (button.onClick) {
            btn.addEventListener('click', button.onClick);
        }
        buttons.appendChild(btn);
    });

    // add warning to console if there are more than 3 buttons
    if (options.buttons.length > 3) {
        warnings.push("It is not recommended to use more than 3 buttons in a toast.");
    }

    // add warning to console if the toast is unsafe
    if (options.unsafe) {
        warnings.push("Unsafe toasts are not recommended.");
    }

    // add warning to console if toast is unsafe, has no autoClose, and has no close button
    if (options.unsafe && !options.autoClose.enabled && !options.closeButton) {
        warnings.push("Unsafe toasts without autoClose or a close button will stay on the screen forever.");
    }

    // add warning to console if autoClose is enabled but no delay or a delay smaller than the needed time to read the toast (300 words per minute) is set
    let needed_delay = options.content.split(' ').length / 300 * 175000;
    debug.push("This toast will most likely need its reader " + needed_delay + "ms to read it.");

    if (options.autoClose.autoAdjust.enabled) {
        // if the delay is too short, or if onlyWhenDelayTooShort is false, adjust the delay to the needed delay
        if (options.autoClose.autoAdjust.onlyWhenDelayTooShort ? options.autoClose.delay < needed_delay : true) {
            options.autoClose.delay = needed_delay;

            if (options.autoClose.autoAdjust.extraTime) {
                options.autoClose.delay += options.autoClose.autoAdjust.extraTime;
            }

            let dbg = "";
            if (!options.autoClose.autoAdjust.extraTime) {
                dbg = "Adjusted autoClose delay to " + options.autoClose.delay + "ms.";
            } else {
                dbg = `Adjusted autoClose delay to " + options.autoClose.delay + "ms (containing ${options.autoClose.autoAdjust.extraTime}ms of extraTime).`;
            }

            debug.push(dbg);
        }
    }

    if (options.autoClose.enabled && (!options.autoClose.delay || options.autoClose.delay < needed_delay)) {
        warnings.push("The autoClose delay is too short. The toast will disappear before the user can read it.");
    }


    // add the title, content, and buttons to the toast
    toast.appendChild(title);
    toast.appendChild(content);
    toast.appendChild(buttons);

    // if autoClose is enabled, close the toast after the delay
    let leftTime = options.autoClose.delay;
    let running = true;
    let progressIntervalDuration = 10;

    if (options.autoClose.enabled) {
        let progressInterval = setInterval(() => {
            if (running) {
                if (options.autoClose.showProgress) {
                    // get the toast's progress bar or create it if it doesn't exist
                    let progress = toast.querySelector('.toast-progress') || document.createElement('div');
                    progress.classList.add('toast-progress');

                    // set the progress bar's width to the time left
                    progress.style.width = `${leftTime / options.autoClose.delay * 100}%`;

                    // add the progress bar to the toast if it doesn't exist
                    if (!toast.querySelector('.toast-progress')) {
                        toast.appendChild(progress);
                    }
                }

                if (leftTime <= 0 || !toast) {
                    clearInterval(progressInterval);
                    toast.remove();
                }

                console.debug("Running progress bar. Left time: " + leftTime + "ms.");

                leftTime -= progressIntervalDuration;
            }
        }, progressIntervalDuration);

        /*toast_timeout = setTimeout(() => {
            wrapper.removeChild(toast);
            if (options.onClose) {
                options.onClose();
            }
        }, options.autoClose.delay);*/
    }

    // Add close button if the following conditions are met:
    // 1. closeButton is true
    // OR
    // 2. closeButton is false, autoClose is false but unsafe is false
    if (options.closeButton || (!options.closeButton && !options.autoClose.enabled && !options.unsafe)) {
        const close = document.createElement('div');
        close.classList.add('toast-close');
        close.innerHTML = '&times;';
        close.addEventListener('click', () => {
            wrapper.removeChild(toast);
            if (options.onClose) {
                options.onClose();
            }
        });
        toast.appendChild(close);
    }

    // pause autoClose if the toast is hovered over and resume it when the mouse leaves with the same time left

    toast.addEventListener('mouseenter', () => {
        if (options.autoClose.enabled) {
            running = false;
        }

        if (options.onMouseEnter) {
            options.onMouseEnter();
        }
    });
    toast.addEventListener('mouseleave', () => {
        if (options.autoClose.enabled) {
            running = true;
        }

        if (options.onMouseLeave) {
            options.onMouseLeave();
        }
    });

    // when on mobile (smaller than 768px), remove all toasts when a new one is created
    if (window.innerWidth < 768) {
        const toasts = wrapper.querySelectorAll('.toast');
        toasts.forEach(toast => {
            toast.remove();
        });
    }

    // add the toast to the wrapper
    wrapper.appendChild(toast);


    // SEND WARNINGS
    // when warnings are present, add them to the console, if ignoreWarnings is not set to true
    if (warnings.length > 0 && !options.ignoreWarnings) {
        let headerfooter = generateHeaderFooter(getLongestLength(warnings), 30, " WARNINGS FOR TOAST WITH ID " + toast_id + " (" + warnings.length + ") ", "=");


        console.warn(headerfooter[0]);
        warnings.forEach(warning => {
            console.warn(warning);
        });
        console.warn("Reference to the toast: ", toast);
        console.warn(headerfooter[1]);
    }


    // SEND DEBUG
    // when debug is enabled, add the debug messages to the console
    if (debug.length > 0 && options.debug) {
        let headerfooter = generateHeaderFooter(getLongestLength(debug), 15, " DEBUG FOR TOAST WITH ID " + toast_id + " (" + debug.length + ") ", "=");

        console.log(headerfooter[0]);
        debug.forEach(msg => {
            console.log(msg);
        });
        console.log("Reference to the toast: ", toast);
        console.log(headerfooter[1]);
    }


    // return the toast element
    return toast;
}