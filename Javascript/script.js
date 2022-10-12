function _next_page(next_id) {
    $('.next-div').hide();
    $('#'+next_id).fadeIn(1000);
}


function _show_add_faculty() {
    $('.add-faculty-overall').animate({'margin-top':'0%'},100);
    $('.add-faculty-main').animate({'margin-top':'0px'},500);
}

function _show_student() {
    $('.overall-student').animate({'margin-left':'0%'},100);
}

function _hide_student() {
    $('.overall-student').animate({'margin-left':'-1000%'},1000);
}


function _hide_add_faculty() {
    $('.add-faculty-overall').animate({'margin-top':'-1000%'},1000);
    $('.add-faculty-main').animate({'margin-top':'-250px'},600);
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
