<script>
    var cls = new Call_Service();
    var card_id = '<?= $_SESSION["card_id"]; ?>';
    var username = '<?= $_SESSION["username"]; ?>';
    var password = '<?= $_SESSION["password"]; ?>';
    $(function () {
        cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "sl_table_profile", "", true, table_profile);
    });
    function show_inside() {
        cls.GetJSON("../../PS_processDB/personnal/per_managePerson.php", "sl_table_profile", "", true, table_profile);
    }

    function table_profile(data) {
        $(".table_profile").html('');
        var dataSet = [];
        var a = 0;
        $.each(data, function (i, k) {
            a++;
            dataSet.push([a, data[i].pro_idpos, data[i].card_id, data[i].pro_prefix + data[i].pro_fname+' '+data[i].pro_lname, data[i].pro_dateIn, '<img class="btn-delete" id="' + data[i].class_id + '" onclick="javascript: delBnIn(this)"/>']);
        });
        $('#table_profile_show').html('<table class="table table-bordered table-striped table-hover table_profile dataTable" width="100%"></table>');
        $('.table_profile').DataTable({
            responsive: true,
            data: dataSet,
            columns: [
                {title: "ลำดับ"},
                {title: "เลขตำแหน่ง"},
                {title: "รหัสบัตรประชาชน"},
                {title: "ชื่อ-สกุล"},
                {title: "วันเข้ารับราชการ"},
                {title: "..."},
            ],
            "fnRowCallback": function (nRow) {
//                console.log($(nRow).find('img').attr('id'));
                $(nRow).attr('id', $(nRow).find('img').attr('id'));
                $(nRow).css('cursor', 'pointer');
            }
        });
    }

    $('#addPerson').find("#pro_picture").change(function () {
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
    
    function addPerson(APS){
        var array[];
        array.push();
        alert($('#pro_prefix').val());
    }
</script>