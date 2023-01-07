  // the selector will match all input controls of type :checkbox
    // and attach a click event handler
    $("input:checkbox").on('click', function() {
        // in the handler, 'this' refers to the box clicked on
        var $box = $(this);
        if ($box.is(":checked")) {
            // the name of the box is retrieved using the .attr() method
            // as it is assumed and expected to be immutable
            var group = "input:checkbox[name2='" + $box.attr("name2") + "']";
            // the checked state of the group/box on the other hand will change
            // and the current value is retrieved using .prop() method
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }


    });

    //photo
    $("#photoH").click(function() {
        $("#photoR").show();
    });
    $("#photoV").click(function() {
        $("#photoR").hide();
    });

    //dob
    $("#dobh").click(function() {
        $("#dobr").show();
    });
    $("#dobv").click(function() {
        $("#dobr").hide();
    });

    //pan
    $("#panh").click(function() {
        $("#panr").show();
    });
    $("#panv").click(function() {
        $("#panr").hide();
    });

    //aadhar
    $("#aadharh").click(function() {
        $("#aadharr").show();
    });
    $("#aadharv").click(function() {
        $("#aadharr").hide();
    });

    //passport
    $("#passporth").click(function() {
        $("#passportr").show();
    });
    $("#passportv").click(function() {
        $("#passportr").hide();
    });

    //ppan
    $("#ppanh").click(function() {
        $("#ppanr").show();
    });
    $("#ppanv").click(function() {
        $("#ppanr").hide();
    });

    //cast
    $("#casth").click(function() {
        $("#castr").show();
    });
    $("#castv").click(function() {
        $("#castr").hide();
    });

    //padd
    $("#paddh").click(function() {
        $("#paddr").show();
    });
    $("#paddv").click(function() {
        $("#paddr").hide();
    });

    //domicile
    $("#domicileh").click(function() {
        $("#domiciler").show();
    });
    $("#domicilev").click(function() {
        $("#domiciler").hide();
    });

    //radd
    $("#raddh").click(function() {
        $("#raddr").show();
    });
    $("#raddv").click(function() {
        $("#raddr").hide();
    });

    //agency
    $("#agencyh").click(function() {
        $("#agencyr").show();
    });
    $("#agencyv").click(function() {
        $("#agencyr").hide();
    });

    //scholarship
    $("#scholarshiph").click(function() {
        $("#scholarshipr").show();
    });
    $("#scholarshipv").click(function() {
        $("#scholarshipr").hide();
    });

    
    //ssc
    $("#ssch").click(function() {
        $("#sscr").show();
    });
    $("#sscv").click(function() {
        $("#sscr").hide();
    });

    //hsc
    $("#hsch").click(function() {
        $("#hscr").show();
    });
    $("#hscv").click(function() {
        $("#hscr").hide();
    });

    //diploma
    $("#diplomah").click(function() {
        $("#diplomar").show();
    });
    $("#diplomav").click(function() {
        $("#diplomar").hide();
    });

    //marksheet
    $("#marksheeth").click(function() {
        $("#marksheetr").show();
    });
    $("#marksheetv").click(function() {
        $("#marksheetr").hide();
    });

      //academic prize
      $("#academicprizeh").click(function() {
        $("#academicprizer").show();
    });
    $("#academicprizev").click(function() {
        $("#academicprizer").hide();
    });


    //academic certificate of partition
    $("#academiccoph").click(function() {
        $("#academiccopr").show();
    });
    $("#academiccopv").click(function() {
        $("#academiccopr").hide();
    });


    //extracurricular prize
    $("#extracurricularh").click(function() {
        $("#extracurricularr").show();
    });
    $("#extracurricularv").click(function() {
        $("#extracurricularr").hide();
    });


    //extracurricular cop
    $("#extracurricularcoph").click(function() {
        $("#extracurricularcopr").show();
    });
    $("#extracurricularcopv").click(function() {
        $("#extracurricularcopr").hide();
    });


    //cocurricular
    $("#cocurricularh").click(function() {
        $("#cocurricularr").show();
    });
    $("#cocurricularv").click(function() {
        $("#cocurricularr").hide();
    });


    //cocurricular cop
    $("#cocurricularcoph").click(function() {
        $("#cocurricularcopr").show();
    });
    $("#cocurricularcopv").click(function() {
        $("#cocurricularcopr").hide();
    });