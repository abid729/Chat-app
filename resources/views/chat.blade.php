<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Chat APP</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <style type="text/css">
   
      </style>
   </head>
   <body>
   <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
   <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
   <link rel="stylesheet" type="text/css" href="css/app.css">
   <script src="https://kit.fontawesome.com/61ebb60581.js" crossorigin="anonymous"></script>

      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
      <div class="container">
         <div class="row clearfix">
            <div class="col-lg-12">
               <div class="card chat-app">
                  <div id="plist" class="people-list">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                     </div>
          
       
                     <ul class="list-unstyled chat-list mt-2 mb-0">
                     @foreach ($chathead as $chathead)
                        
                     <li class="clearfix">
                     @if ($chathead->group_image)
                     <img src="{{url($chathead->group_image)}}" alt="avatar">
                     @else
                     @if ($chathead->chat_head_image)
                     <img src="{{url($chathead->chat_head_image)}}" alt="avatar">
                     @else
                     @endif
                     @endif

                     

                     <div class="about">
                           @if ($chathead->group_name)
                           <div class="name">{{ $chathead->group_name }}</div>
                           
                          @else
                          <div class="name">{{ $chathead->chat_head_name }}</div>
                         @endif
                              <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>
                           </div>
                        </li>
                        @endforeach
                       
                    
                     </ul>
                  </div>
                  <div class="chat">
                     <div class="chat-header clearfix">
                        <div class="row">
                           <div class="col-lg-6">
                              <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                              <img src="{{url('/images/bhai.jpg')}}" alt="avatar">
                              </a>
                              <div class="chat-about">
                                 <h6 class="m-b-0">Bhai ❤️</h6>
                                 <small>online</small>
                              </div>
                           </div>
                        </div>
                     </div>
                     @php
                     use Carbon\Carbon;
                     @endphp
                     <div class="chat-history">
                        <ul class="m-b-0">
                           @foreach ($chats as $chat)
                           @php 
                           $dateTime = new DateTime($chat->created_at);
                           @endphp
                           <li class="clearfix">
                              <div class="message-data text-right">
                                 <span class="message-data-time text-right">{{ $dateTime->format('h:i A') }}
                                 , {{ $day = $dateTime->format('l') }}</span>
                                 <img src="{{url('/images/my-pic.jpg')}}" alt="avatar">
                              </div>

                              <div class="message other-message float-right">{{ $chat->message }} </div>
                              @php $status = "sent";
                               if($status == "read") {@endphp
                                 <span class="icon read float-right"><i class="fas fa-check-double"></i></span>
                              @php } else if($status == "delivered") { @endphp
                                 <span class="icon delivered float-right"><i class="fas fa-check-double"></i></span>
                              @php } else { @endphp
                                 <span class="icon sent float-right"><i class="fas fa-check"></i></span>
                               @php }  @endphp
                                 </li>
                           @endforeach
                        </ul>
                     </div>
                     <div class="chat-message clearfix">
                        <div class="input-group mb-0">
                           <div class="input-group-prepend"></div>
                           <form action="{{ route('chat.store') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <span class="typing-status"></span>
                              <div class="message-box">
                              <textarea class="message-input" placeholder="Type your message..." name = "message"></textarea>
                              <button class="send-button" type= "submit"><i class="fa fa-send"></i></button>
                              </div>
                            </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript">
        if (navigator.onLine) {
           // Mark the message as delivered
        //    updateMessageStatus(123);
            console.log('delivered');
        }
        var typingTimer = null;
var typingInterval = 1000; // in milliseconds

$(document).on('keydown', '.message-input', function() {
  // Clear the previous typing timer, if any
  clearTimeout(typingTimer);

  // Show the "typing" message to the user
  $('.typing-status').text('typing...');

  // Set a new typing timer to check if the user has stopped typing
  typingTimer = setTimeout(function() {
    // Hide the "typing" message since the user has stopped typing
    $('.typing-status').text('');
  }, typingInterval);
});

$(document).on('keyup', '.message-input', function() {
  // Clear the previous typing timer, if any
  clearTimeout(typingTimer);

  // Set a new typing timer to check if the user has stopped typing
  typingTimer = setTimeout(function() {
    // Hide the "typing" message since the user has stopped typing
    $('.typing-status').text('');
  }, typingInterval);
});

      </script>
   </body>
</html>
