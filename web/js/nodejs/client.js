(function($){
    var socket = io.connect('http://localhost:4242');
    
    socket.emit("new_connection", {
        username: "username"
    });
    
})(jQuery);
