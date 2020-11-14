<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="pickadate.js-3.6.2/lib/themes/default.css">
    <link rel="stylesheet" href="pickadate.js-3.6.2/lib/themes/default.date.css">
    <link rel="stylesheet" href="pickadate.js-3.6.2/lib/themes/default.time.css">
  </head>
  <body>
    <input
      id="date1"
      size="60"
      type="date"
      format="DD/MM/YYYY"
      placeholder="DD/MM/YYYY"
      min="2020-07-01"
      max="2020-10-30"
    />
    <input class="datepicker" type="date" name="" id=""  />
    <br />
    <hr />
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <script src="pickadate.js-3.6.2/lib/picker.js"></script>
 <script src="pickadate.js-3.6.2/lib/picker.date.js"></script>
 <script src="pickadate.js-3.6.2/lib/picker.time.js"></script>
  <script>
var $input = $('.datepicker').pickadate();

// Use the picker object directly.
var picker = $input.pickadate('picker');
// Disable all the dates
picker.set('disable', [
  { from: [2020,3,14], to: [2020,3,21] }
])


  </script>
  <script>
  var $input = $('.datepicker').pickadate({
    onClose: function() {
      console.log(this.get('select', 'yyyy/mm/dd'));
      // console.log("ha ana ");
      $("#creneux").fadeIn(2000);
      // }
    },
    // onSet: function(context) {
    //   // console.log("select"+ this.get('select'));
    //   foo = new Date(context.select);
    //       var curr_date = foo.getDate();

    //       var curr_month = foo.getMonth();

    //       var curr_year = foo.getFullYear();
    //       var dateFormated=(curr_date + "-" + curr_month + "-" + curr_year);
    //       console.log(dateFormated);
    //       if(dateFormated==null){
    //         document.getElementById("creneux").style.display="none";
    //       }
    // }
  });

  // Use the picker object directly.
  var picker = $input.pickadate('picker');
  // Disable all the dates
  if (picker.clear()) {
    $("#creneux").fadeOut(1000);
  }
  picker.set('disable', [{
    from: [2020, 10, 14],
    to: [2020, 10, 21]
  }]);
  //  var x = document.getElementsByClassName("picker__box"); 
  //  var x = $(".picker__box");
  //  x.on('click', function() {
  //    console.log("select"+ picker.get('select'));
  //   console.log("date"+ picker.get('select', 'yyyy/mm/dd'));
  //     document.getElementById("creneux").style.display="block";
  //   });
</script>
</html>
