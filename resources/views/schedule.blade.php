 @extends('layouts.app')　　　　　　　　　　　　　　　　　　

 @section('content')
  
  
   
<div id='calendar'></div>  

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>

      document.addEventListener('DOMContentLoaded', function()
      { 
           var calendarEl = document.getElementById('calendar');
           var calendar = new FullCalendar.Calendar(calendarEl, 
           {
           
                
                 views: {
                    dayGridMonth: {
                      titleFormat: { year: 'numeric', month: 'numeric' },
                      
                      //ja表記やけどnumericで数字に変えた
                      
                    },
                    
                    },
                 
                 locale: 'ja',
                buttonText: {
                    prev:     '<',
                    next:     '>',
                    today:    '今日',
                    month:    '月',
                    
                },
                 
                 
                 dayCellContent: function(e) {
                   e.dayNumberText = e.dayNumberText.replace('日', '');
                  },
                  //日付の"日"表示をなくした
                 
                 header: {
                 left: "prev,next today",
                 center: "title",
                 right: "dayGridMonth,timeGridWeek,dayGridDay",
                  },
                  
                
                
                events:function(fetchinfo, successCallback)
                {
                    $.ajax({
                     method: "get",
                     url: "/menus",
                     dataType: "json"})
                   
                    .done((res) => {
                    let date =res;
                    let menus = res;
                    let events=[];
                    for(let i =0;i<menus.length;i++)
                       {
                           events.push({
                            'id':menus[i].id,
                            'title':menus[i].title, 
                            'start':menus[i].click_date,
                            'url' :`/show/${menus[i].id}`,
                            'backgroundColor':menus[i].color,
                            'borderColor':menus[i].color
                            
                         });
                        }
                        
                        
                     successCallback(events);
                     
                     
                  }); 
                },
                
                
                 dateClick: (e)=>{
    		       console.log("dateClick:", e);
    		       window.location.href=`/post/${e.dateStr}`;
    	         },
    	         
    	        
                     
                  
    	         
           });
           calendar.render();
      });
      
     

    </script>
    
    <style>
        .fc-view-harness{
            font-family:'impact';
            font-color:black;
        }
    </style>
      
     
      
      



@endsection


