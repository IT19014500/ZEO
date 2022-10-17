session_start();

$('#button').click(function(){

var uname = $('#btrname').val();
// alert(name);
$.ajax({
    url:'page.php',
    data:'user='+ uname,
    sucess:function(data){
        $('#contentds').html(data);
        // $_SESSION['tidp']  = name;
    }
});

}
);