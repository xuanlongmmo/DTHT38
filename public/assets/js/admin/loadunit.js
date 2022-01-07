$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function loaddistrict(e){
    var val = e.value;
    
    $(document).ready(function(){
        $.ajax({
            url:"admin/relics/loaddistrict",
            method:'POST',
            data: {
                val: val,
            },
            success: function(data){
                $('#district').html('');
                $('#district').append('<option label="Chọn Quận/Huyện"></option>');
                
                if (val != '') {
                    data.forEach(element => {
                        var option = '<option value="'+element['id']+'">'+element['name']+'</option>';
                        $('#district').append(option);
                    });
                } 

                return 0;
            },
        });
    });
}

function loadward(e){
    var val = e.value;
    
    $(document).ready(function(){
        $.ajax({
            url:"admin/relics/loadward",
            method:'POST',
            data: {
                val: val,
            },
            success: function(data){
                $('#ward').html('');
                $('#ward').append('<option label="Chọn Phường/Xã"></option>');
                
                if (val != '') {
                    data.forEach(element => {
                        var option = '<option value="'+element['id']+'">'+element['name']+'</option>';
                        $('#ward').append(option);
                    });
                } 

                return 0;
            },
        });
    });
}