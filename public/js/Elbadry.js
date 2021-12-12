function push_element( name ){


    console.log(name);
    var input_value = $("#"+name+"").val();
    var input_type = $("#"+name+"").attr('type');
    console.log(input_value);
    if (input_value === '' || input_value == null)
    {
        $("#"+name+"").focus();

    }else {
        var uuid = Math.floor((Math.random() * 100) + 1);
        var row_built = '<tr id="removable'+uuid+'">';

        row_built += '<td><div class="form-group"><input class="form-control" name="'+name+'[]" value="'+input_value+'" type="'+input_type+'"></div></td>';
        row_built += '<td class="text-center"><a href="javascript:void(0)" id="'+uuid+'" class="delete-row btn btn-danger"><i class="fa fa-trash"></i></a></td>';
        row_built += '</tr>';
        $("#"+name+"_table_body").append(row_built);
        $("#"+name+"").val("");
    }
}

function initSingleSwitchery(elem) {
    var init = new Switchery(elem,{ size: 'small' });
}


// js switchery multiple
function initSwichery() {
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function(html) {
        var switchery = new Switchery(html,{ size: 'small' });
    });
}

initSwichery();

function toggleBoolean(el , url)
{
    var checked = $(el).is(':checked');
    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function (data) {
            if (data.status === 0)
            {
                $(el).prop('checked',!checked);
                $(el).next().remove();
                initSingleSwitchery(el);
                $("#removable"+data.id).remove();
                swal({
                    title: "فشلت العملية!",
                    text: data.massage,
                    type: "error",
                    confirmButtonText: "حسناً"
                });
            }

        },error: function () {
            $(el).prop('checked',!checked);
            $(el).next().remove();
            initSingleSwitchery(el);
            Swal.fire("خطأ!", "حدث خطأ", "error");
        }
    });
}

$('.table_body').on( 'click','a.delete-row', function (e) {

    console.log(10000);
    e.preventDefault();
    console.log(this.id);
    var elToDel = $("#removable" + this.id);
    console.log(elToDel);
    elToDel.remove();
});

$(document).ready(function () {

    //console.log(1);

});