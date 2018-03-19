<script>
    var cls = new Call_Service();
    var card_id = '<?= $_SESSION["card_id"]; ?>';
    var username = '<?= $_SESSION["username"]; ?>';
    var password = '<?= $_SESSION["password"]; ?>';
    $(function () {
        cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "get_prefix", "", true, function (data) {
            $('#p_prefix').html('<option  value="">เลือก</opition>');
            $.each(data, function (i) {
                $("#p_prefix").append('<option  value="' + data[i].pf_id + '">' + data[i].pf_name + '</opition>');
            });
        });
        cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "get_type", "", true, function (data) {
            $('#p_type').html('<option  value="">เลือก</opition>');
            $.each(data, function (i) {
                $("#p_type").append('<option  value="' + data[i].type_id + '">' + data[i].type_name + '</opition>');
            });
        });
        cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "get_position", "", true, function (data) {
            $('#p_position').html('<option  value="">เลือก</opition>');
            $.each(data, function (i) {
                $("#p_position").append('<option  value="' + data[i].pos_code + '">' + data[i].pos_name + '</opition>');
            });
        });
    });
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