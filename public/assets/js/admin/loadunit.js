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
                var html = '';
                if (val != '') {
                    data.forEach(element => {
                        html += '<option value="'+element['id']+'">'+element['name']+'</option>';
                    });
                }
                $('#district').html(html);
                $('#ward').html('');
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
                var html = '';
                if (val != '') {
                    data.forEach(element => {
                        html += '<option value="'+element['id']+'">'+element['name']+'</option>';
                    });
                } 
                $('#ward').html(html);
                return 0;
            },
        });
    });
}