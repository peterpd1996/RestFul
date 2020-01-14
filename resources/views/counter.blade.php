
<!DOCTYPE html>
<html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
     // Khởi tạo một đối tượng Pusher với app_key
    var pusher = new Pusher('480cb32bc5b2f6d195e4', {
      cluster: 'ap1',
      forceTLS: true
    });
//Đăng ký với kênh chanel-demo-real-time mà ta đã tạo trong file DemoPusherEvent.php
    var channel = pusher.subscribe('my-channel');
        //Bind một function addMesagePusher với sự kiện DemoPusherEvent
    channel.bind('form-submit', function(data) {
      //alert(JSON.stringify(data));
    
        document.getElementById("message").innerHTML = data.text;
    
    
    });
    /*
    
      $(document).ready(function(){
         Khởi tạo một đối tượng Pusher với app_key
        var pusher = new Pusher('b667578f700be85ce3ec', {
            cluster: 'ap1',
            encrypted: true
        });
        Đăng ký với kênh chanel-demo-real-time mà ta đã tạo trong file DemoPusherEvent.php
        var channel = pusher.subscribe('channel-demo-real-time');
        Bind một function addMesagePusher với sự kiện DemoPusherEvent
        channel.bind('App\\Events\\DemoPusherEvent', addMessageDemo);
      });
      function add message
      function addMessageDemo(data) {
        var liTag = $("<li class='list-group-item'></li>");
        liTag.html(data.message);
        $('#messages').append(liTag);
      }
  
    */
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p id="message">
   
  </p>
</body>
</html>