'name' => 'rating_19', 
'pluginOptions' => [
    'step' => 1,
    'disabled' => 
    'showCaption' => false,
    'showClear' => false,
    'min'=>0,
    'max'=>5,
],
'pluginEvents' => [
    'rating.change' => "function(event, value, caption) {
    $.ajax({
        url:'/site/rating',
        method:'post',
        data: {
            stars:value,
            id:".$id.",
        },
        dataType:'json',
        success: function(data){
            location.reload();
        },
        error: function(){
            alert('Error!');
        }
    });
}"