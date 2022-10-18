<div>
    <h3>Gespeicherte Kreditkarten</h3>
    <ul class="slist">
        <li class="icon-text default"><span>1121 2150 3301 1616</span><span class="icon">delete</span></li>
        <li class="icon-text"><span>2381 2335 3608 3639</span><span class="icon">delete</span></li>
    </ul>


</div>


<script type="module">
    new Cleave('#creditcard', {
        blocks: [4, 4, 4, 4],
        onValueChanged: function (event) {
            console.log(event.target.value);
        },
        onlyNumeric: true,
    });
</script>