
var iframe = document.querySelector('iframe');
var player = new Vimeo.Player(iframe);
var preview = 0;

player.on('play', function() {
    jQuery.ajax({
        type:'POST',
        url: admin_url.ajax_url,
        data: {action:'searchUsers', valor: data },

        beforeSend: function(){
            console.log('before');
        },
        success: function(data) {
            console.log('success');
        },
        error: function(error) {
            console.log(error);
        }

    });
});

player.on('seeked', function(data) {
    player.destroy().then(function() {
        // the player was destroyed
    }).catch(function(error) {
        // an error occurred
    });
});

