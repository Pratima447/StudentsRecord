<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
</head>

<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bPopup/0.11.0/jquery.bpopup.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

<div id="confirm_pop" style="display:none">
    <span class="button b-close">
        <span>X</span>
    </span>
    <h3 id="pop_title_confirm"></h3>
    <input type="button" id="pop_ok" class="btn btn-danger" value="Yes Delete it!" style="margin:17px;"/>
    <input type="button" id="pop_exit" class="btn btn-success" value="No,let it Be!" style="margin:17px;"/>
</div>
    @yield('content')
    @yield('footer')
</body>

</html>

@section('scripts')
<script type="text/javascript">

function promoteMe(id)
{
    glob_stud_id = id;
    $.ajax({
        type: "get",
        url : "{{ Request::root() }}/promote/"+glob_stud_id,
        success: function(data) {
                if(data=="1")
                {
                    alert("Student promoted successfully");
                }
                else
                {
                    alert("Sorry..Student not promoted!!");
                }
                window.location = "{{Request::root() }}/stdrecord/list";
            },
    })
}
function deleteMe(id, confirm)
{
    if (confirm == undefined)
    {
        confirm = '';
    }
    glob_stud_id = id;
    eventTrigger = 'deleteStud';

    if (confirm == true)
    {
        $.ajax({
            type: "get",
            url : "{{ Request::root() }}/delete/"+glob_stud_id,
            beforeSend: function()
            {
                $('#confirm_pop').css('display', 'block');
                $('.b-close').click();
            },
            success: function(data) {
                if(data=="1")
                {
                    alert("Record deleted successfully");
                }
                else
                {
                    alert("Record not deleted");
                }
                window.location = "{{Request::root() }}/stdrecord/list";
            },
            error: function(e) {
                alert(e);
                window.location = "{{Request::root() }}/stdrecord/list";
            }
        });
    }
    else
    {
        if ($('#confirm_pop').css('display') == 'none')
        {
            getConfirmation("Sure to Delete this Record??");
        }
    }
}

function getConfirmation(title)
{
    var send_but = 0;
    $("#pop_title_confirm").html(title);
    $("#confirm_pop").bPopup();
    $("#pop_ok").click(function() {
        deleteMe(glob_stud_id, true);
    });

    $("#pop_exit").click(function() {
        $('#confirm_pop').css('display', 'block');
        $('.b-close').click();
    });
}

function reseta()
{
  var data = confirm('Want to exit??');
  
  if(data=="1")
  {
      window.location='/stdrecord/list';
  }
  else
  {
      return false;
  }
}
</script>