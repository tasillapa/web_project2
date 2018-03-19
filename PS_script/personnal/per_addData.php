<script>
    $('#addPerson').find("#upload-img").change(function () {
        readURLProfile(this);
    });

    function readURLProfile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgS').attr('src', e.target.result);
                $('#zoom-img').attr('href', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            console.log(reader);
        }
    }
</script>