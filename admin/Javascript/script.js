function _next_page(next_id) {
    $('.next-div').hide();
    $('#'+next_id).fadeIn(1000);
}


function _validate_inputs(){
    var message = 'Fill in the necessary fields to continue';

    var Firstname= $('#firstname').val(); 
    var Middlename= $('#middlename').val();
    var Lastname= $('#lastname').val();
    var Age= $('#age').val();
    var Gender= $('#gender').val();
    var Email= $('#email').val();
    var Country= $('#country').val();
    var City= $('#city').val();
    var Lga= $('#lga').val();
    var Residentialaddress= $('#residentialaddress').val();
    var Department= $('#department').val();
    var Role= $('#role').val(); 
    var Level= $('#level').val(); 
    var facultyname= $('#facultyname').val();
    var departmentname= $('#departmentname').val();
    var coursecode= $('#coursecode').val();
    var coursename= $('#coursename').val();
    var selectstaff= $('#selectstaff').val();
    var picklevel= $('#picklevel').val();
    var selectlevel= $('#selectlevel').val();
    var choosestaff= $('#choosestaff').val();
    var week= $('#week').val();
    var topic= $('#topic').val();
    var period= $('#period').val();
    var summary= $('#summary').val();


    if( (Firstname=='') || (Middlename=='') || (Lastname=='') || (Age=='') || (Gender=='') || (Email=='') ||
    (Country=='') || (City=='') || (Lga=='') || (Residentialaddress=='') || (Department=='') 
    || (Role=='') || (Level=='') || (departmentname =='')  ){
        alert(message);
    }
}


function displayImage(image){
    if (image.files[0]) {
        var reader = new FileReader();
        reader.onload= function(image){
            document.querySelector('#ImageDisplay').setAttribute('src', image.target.result);
        }
        reader.readAsDataURL( image.files[0]);
    }
}



function triggerClick(){
    document.querySelector('#ImageSelector').click();
}



// VIDEO SCRIPT //
function showVideo(video) {
    if (video.files[0]){
        var reader = new FileReader();

        reader.onload = function(video) {
            document.querySelector('#videoDisplay').setAttribute('src', video.target.result);
        }
        reader.readAsDataURL(video.files[0]);
    }
}
  

// TIME FUNCTION //
setInterval(displayclock, 500);

          
function displayclock () {
    var time = new Date();
    var hours = time.getHours();
    var minutes = time.getMinutes();
    var seconds = time.getSeconds();
    var en = 'AM';

    if (hours > 12){
      en = 'PM';
     }
     if (hours > 12){
      hours = hours - 12;
     }

     if (hours == 0){
      hours = 12;
     }

     if (minutes < 10){
      minutes = '0' + minutes;
     }

     
     if (seconds < 10){
      seconds = '0' + seconds;
     }

document.getElementById('clock').innerHTML = hours + ':' + minutes + ':' + seconds + ' ' + en;
}


//  DATE FUNCTION //
setInterval(MyDate, 500);
function MyDate (){
    var mydate = new Date();
    var day = mydate.getDay();
    var month = mydate.getMonth();
    var year = mydate.getYear();
    var d = mydate.getDate();

        if(year < 1000){
        year+=1900;
    }
        if (d<10){
          d = '0' + d;
        }
        
        var darr = new Array("Sunday","Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
        var marr = new Array("January","February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        
        document.getElementById('date').innerHTML = ''+darr[day]+', '+marr[month]+' '+d+', '+year+ '.';
}



// COUNT FUNCTION //
const counters = document.querySelectorAll('.counter');
const speed = 200;

counters.forEach(counter => {
    const updateCount = () => {

        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;

        const inc = target / speed;

        if(count < target) {
            counter.innerText = Math.ceil(count + inc);
            setTimeout(updateCount, 1);
        } else {
           count.innerText = target
        }


    }

    updateCount();
}
    
    
    
    
    
    );




   

    function _show_dues_confirmation() {
        $('.dues_confirmation').animate({'right':'0%'},100);
        $('.dues_confirmation-main').animate({'margin-right':'0px'},500);
    }

    function _hide_dues_confirmation() {
        $('.dues_confirmation').animate({'right':'-1000%'},1000);
        $('.dues_confirmation-main').animate({'margin-right':'-250px'},600);
    }

    (function alternate_text () {
        var words = [
            "Ounje'l'Eyin",
            "Aje Yee !!!"
        ],
        i = 0;
        setInterval(function() {
          $('#words').fadeOut(function() {
              $(this).html(words[(i = (i + 1) % words.length)]).fadeIn();

          });
        }, 1500)
    })();
    

    function _open_menu() {
        $('.menu-bar-overall-div').animate({'margin-left':'0%'},200);
        $('.side-menu-bar').animate({'margin-left':'0px'},400);
    }
    
    
    function _close_menu() {
        $('.menu-bar-overall-div').animate({'margin-left':'-1000%'},400);
        $('.side-menu-bar').animate({'margin-left':'-250px'},200);
    }


    // SHOW NOTIFICATION

    function _open_notification() {
        $('.notification-overall').animate({'bottom':'0%'},300);
        $('.notification-main').animate({'margin-bottom':'0px'},600);
    }
    
    
    function _close_notification() {
        $('.notification-overall').animate({'bottom':'-1000%'},400);
        $('.notification-main').animate({'margin-bottom':'-250px'},200);
    }

    // IMAGE  //
    function displayImage(image){
        if (image.files[0]) {
            var reader = new FileReader();
            reader.onload= function(image){
                document.querySelector('#ImageDisplay').setAttribute('src', image.target.result);
            }
            reader.readAsDataURL( image.files[0]);
        }
    }
    
    
    
    function triggerClick(){
        document.querySelector('#ImageSelector').click();
    }
    

