    <!-- Datatables -->
    <script src="<?php echo admin_theme('');?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>


     <!-- bootstrap-wysiwyg -->
    <script src="<?php echo admin_theme('');?>/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/google-code-prettify/src/prettify.js"></script>

    <!-- jQuery Tags Input -->
    <script src="<?php echo admin_theme('');?>/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="<?php echo admin_theme('');?>/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo admin_theme('');?>/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="<?php echo admin_theme('');?>/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="<?php echo admin_theme('');?>/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo admin_theme('');?>/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="<?php echo admin_theme('');?>/vendors/starrr/dist/starrr.js"></script>

    <!-- FastClick -->
    <script src="<?php echo admin_theme('');?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo admin_theme('');?>/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo admin_theme('');?>/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="<?php echo admin_theme('');?>/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- morris.js -->
    <script src="<?php echo admin_theme('');?>/vendors/raphael/raphael.min.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/morris.js/morris.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo admin_theme('');?>/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo admin_theme('');?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo admin_theme('');?>/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo admin_theme('');?>/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo admin_theme('');?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo admin_theme('');?>/vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo admin_theme('');?>/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo admin_theme('');?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- easy-pie-chart -->
    <script src="<?php echo admin_theme('');?>/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

<!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {
        $('#birthday').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
    <script>
      $(document).ready(function() {
        $('#start_date').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
    <script>
      $(document).ready(function() {
        $('#end_date').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->

    <!-- bootstrap-wysiwyg -->
    <script>
      $(document).ready(function() {
        function initToolbarBootstrapBindings() {
          var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
              'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
              'Times New Roman', 'Verdana'
            ],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
          $.each(fonts, function(idx, fontName) {
            fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
          });
          $('a[title]').tooltip({
            container: 'body'
          });
          $('.dropdown-menu input').click(function() {
              return false;
            })
            .change(function() {
              $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
            })
            .keydown('esc', function() {
              this.value = '';
              $(this).change();
            });

          $('[data-role=magic-overlay]').each(function() {
            var overlay = $(this),
              target = $(overlay.data('target'));
            overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
          });

          if ("onwebkitspeechchange" in document.createElement("input")) {
            var editorOffset = $('#editor').offset();

            $('.voiceBtn').css('position', 'absolute').offset({
              top: editorOffset.top,
              left: editorOffset.left + $('#editor').innerWidth() - 35
            });
          } else {
            $('.voiceBtn').hide();
          }
        }

        function showErrorAlert(reason, detail) {
          var msg = '';
          if (reason === 'unsupported-file-type') {
            msg = "Unsupported format " + detail;
          } else {
            console.log("error uploading file", reason, detail);
          }
          $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
            '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
        }

        initToolbarBootstrapBindings();

        $('#editor').wysiwyg({
          fileUploadError: showErrorAlert
        });

        window.prettyPrint;
        prettyPrint();
      });
    </script>
    <!-- /bootstrap-wysiwyg -->

    <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select a state",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 12,
          placeholder: "Có thể chọn nhiều phòng ban",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->

    <!-- jQuery Tags Input -->
    <script>
      function onAddTag(tag) {
        alert("Added a tag: " + tag);
      }

      function onRemoveTag(tag) {
        alert("Removed a tag: " + tag);
      }

      function onChangeTag(input, tag) {
        alert("Changed a tag: " + tag);
      }

      $(document).ready(function() {
        $('#tags_1').tagsInput({
          width: 'auto'
        });
      });
    </script>
    <!-- /jQuery Tags Input -->

    <!-- Parsley -->
    <script>
      $(document).ready(function() {
        $.listen('parsley:field:validate', function() {
          validateFront();
        });
        $('#demo-form .btn').on('click', function() {
          $('#demo-form').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#demo-form').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });

      $(document).ready(function() {
        $.listen('parsley:field:validate', function() {
          validateFront();
        });
        $('#demo-form2 .btn').on('click', function() {
          $('#demo-form2').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#demo-form2').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });
      try {
        hljs.initHighlightingOnLoad();
      } catch (err) {}
    </script>
    <!-- /Parsley -->

    <!-- Autosize -->
    <script>
      $(document).ready(function() {
        autosize($('.resizable_textarea'));
      });
    </script>
    <!-- /Autosize -->

    <!-- jQuery autocomplete -->
    <script>
      $(document).ready(function() {
        var countries = { AD:"Andorra",A2:"Andorra Test",AE:"United Arab Emirates",AF:"Afghanistan",AG:"Antigua and Barbuda",AI:"Anguilla",AL:"Albania",AM:"Armenia",AN:"Netherlands Antilles",AO:"Angola",AQ:"Antarctica",AR:"Argentina",AS:"American Samoa",AT:"Austria",AU:"Australia",AW:"Aruba",AX:"Åland Islands",AZ:"Azerbaijan",BA:"Bosnia and Herzegovina",BB:"Barbados",BD:"Bangladesh",BE:"Belgium",BF:"Burkina Faso",BG:"Bulgaria",BH:"Bahrain",BI:"Burundi",BJ:"Benin",BL:"Saint Barthélemy",BM:"Bermuda",BN:"Brunei",BO:"Bolivia",BQ:"British Antarctic Territory",BR:"Brazil",BS:"Bahamas",BT:"Bhutan",BV:"Bouvet Island",BW:"Botswana",BY:"Belarus",BZ:"Belize",CA:"Canada",CC:"Cocos [Keeling] Islands",CD:"Congo - Kinshasa",CF:"Central African Republic",CG:"Congo - Brazzaville",CH:"Switzerland",CI:"Côte d’Ivoire",CK:"Cook Islands",CL:"Chile",CM:"Cameroon",CN:"China",CO:"Colombia",CR:"Costa Rica",CS:"Serbia and Montenegro",CT:"Canton and Enderbury Islands",CU:"Cuba",CV:"Cape Verde",CX:"Christmas Island",CY:"Cyprus",CZ:"Czech Republic",DD:"East Germany",DE:"Germany",DJ:"Djibouti",DK:"Denmark",DM:"Dominica",DO:"Dominican Republic",DZ:"Algeria",EC:"Ecuador",EE:"Estonia",EG:"Egypt",EH:"Western Sahara",ER:"Eritrea",ES:"Spain",ET:"Ethiopia",FI:"Finland",FJ:"Fiji",FK:"Falkland Islands",FM:"Micronesia",FO:"Faroe Islands",FQ:"French Southern and Antarctic Territories",FR:"France",FX:"Metropolitan France",GA:"Gabon",GB:"United Kingdom",GD:"Grenada",GE:"Georgia",GF:"French Guiana",GG:"Guernsey",GH:"Ghana",GI:"Gibraltar",GL:"Greenland",GM:"Gambia",GN:"Guinea",GP:"Guadeloupe",GQ:"Equatorial Guinea",GR:"Greece",GS:"South Georgia and the South Sandwich Islands",GT:"Guatemala",GU:"Guam",GW:"Guinea-Bissau",GY:"Guyana",HK:"Hong Kong SAR China",HM:"Heard Island and McDonald Islands",HN:"Honduras",HR:"Croatia",HT:"Haiti",HU:"Hungary",ID:"Indonesia",IE:"Ireland",IL:"Israel",IM:"Isle of Man",IN:"India",IO:"British Indian Ocean Territory",IQ:"Iraq",IR:"Iran",IS:"Iceland",IT:"Italy",JE:"Jersey",JM:"Jamaica",JO:"Jordan",JP:"Japan",JT:"Johnston Island",KE:"Kenya",KG:"Kyrgyzstan",KH:"Cambodia",KI:"Kiribati",KM:"Comoros",KN:"Saint Kitts and Nevis",KP:"North Korea",KR:"South Korea",KW:"Kuwait",KY:"Cayman Islands",KZ:"Kazakhstan",LA:"Laos",LB:"Lebanon",LC:"Saint Lucia",LI:"Liechtenstein",LK:"Sri Lanka",LR:"Liberia",LS:"Lesotho",LT:"Lithuania",LU:"Luxembourg",LV:"Latvia",LY:"Libya",MA:"Morocco",MC:"Monaco",MD:"Moldova",ME:"Montenegro",MF:"Saint Martin",MG:"Madagascar",MH:"Marshall Islands",MI:"Midway Islands",MK:"Macedonia",ML:"Mali",MM:"Myanmar [Burma]",MN:"Mongolia",MO:"Macau SAR China",MP:"Northern Mariana Islands",MQ:"Martinique",MR:"Mauritania",MS:"Montserrat",MT:"Malta",MU:"Mauritius",MV:"Maldives",MW:"Malawi",MX:"Mexico",MY:"Malaysia",MZ:"Mozambique",NA:"Namibia",NC:"New Caledonia",NE:"Niger",NF:"Norfolk Island",NG:"Nigeria",NI:"Nicaragua",NL:"Netherlands",NO:"Norway",NP:"Nepal",NQ:"Dronning Maud Land",NR:"Nauru",NT:"Neutral Zone",NU:"Niue",NZ:"New Zealand",OM:"Oman",PA:"Panama",PC:"Pacific Islands Trust Territory",PE:"Peru",PF:"French Polynesia",PG:"Papua New Guinea",PH:"Philippines",PK:"Pakistan",PL:"Poland",PM:"Saint Pierre and Miquelon",PN:"Pitcairn Islands",PR:"Puerto Rico",PS:"Palestinian Territories",PT:"Portugal",PU:"U.S. Miscellaneous Pacific Islands",PW:"Palau",PY:"Paraguay",PZ:"Panama Canal Zone",QA:"Qatar",RE:"Réunion",RO:"Romania",RS:"Serbia",RU:"Russia",RW:"Rwanda",SA:"Saudi Arabia",SB:"Solomon Islands",SC:"Seychelles",SD:"Sudan",SE:"Sweden",SG:"Singapore",SH:"Saint Helena",SI:"Slovenia",SJ:"Svalbard and Jan Mayen",SK:"Slovakia",SL:"Sierra Leone",SM:"San Marino",SN:"Senegal",SO:"Somalia",SR:"Suriname",ST:"São Tomé and Príncipe",SU:"Union of Soviet Socialist Republics",SV:"El Salvador",SY:"Syria",SZ:"Swaziland",TC:"Turks and Caicos Islands",TD:"Chad",TF:"French Southern Territories",TG:"Togo",TH:"Thailand",TJ:"Tajikistan",TK:"Tokelau",TL:"Timor-Leste",TM:"Turkmenistan",TN:"Tunisia",TO:"Tonga",TR:"Turkey",TT:"Trinidad and Tobago",TV:"Tuvalu",TW:"Taiwan",TZ:"Tanzania",UA:"Ukraine",UG:"Uganda",UM:"U.S. Minor Outlying Islands",US:"United States",UY:"Uruguay",UZ:"Uzbekistan",VA:"Vatican City",VC:"Saint Vincent and the Grenadines",VD:"North Vietnam",VE:"Venezuela",VG:"British Virgin Islands",VI:"U.S. Virgin Islands",VN:"Vietnam",VU:"Vanuatu",WF:"Wallis and Futuna",WK:"Wake Island",WS:"Samoa",YD:"People's Democratic Republic of Yemen",YE:"Yemen",YT:"Mayotte",ZA:"South Africa",ZM:"Zambia",ZW:"Zimbabwe",ZZ:"Unknown or Invalid Region" };

        var countriesArray = $.map(countries, function(value, key) {
          return {
            value: value,
            data: key
          };
        });

        // initialize autocomplete with custom appendTo
        $('#autocomplete-custom-append').autocomplete({
          lookup: countriesArray
        });
      });
    </script>
    <!-- /jQuery autocomplete -->

    <!-- Starrr -->
    <script>
      $(document).ready(function() {
        $(".stars").starrr();

        $('.stars-existing').starrr({
          rating: 4
        });

        $('.stars').on('starrr:change', function (e, value) {
          $('.stars-count').html(value);
        });

        $('.stars-existing').on('starrr:change', function (e, value) {
          $('.stars-count-existing').html(value);
        });
      });
    </script>
    <!-- /Starrr -->

<script type="text/javascript">
  $(document).ready(function() {
    $('input[name=account_type]').click(function () {
        if (this.id == "truongphong") {
            $("#combo_truongphong").show('slow');
            $("#combo_nhanvien").hide();
            $("#combo_lanhdao").hide();
        } else {
            $("#combo_truongphong").hide();
        }

        if (this.id == "nhanvien") {
            $("#combo_nhanvien").show('slow');
            $("#combo_truongphong").hide();
            $("#combo_lanhdao").hide();
        } else {
             $("#combo_nhanvien").hide();
        }
        if (this.id == "lanhdao") {
            $("#combo_lanhdao").show('slow');
            $("#combo_truongphong").hide();
            $("#combo_nhanvien").hide();
        } else {
             $("#combo_lanhdao").hide();
        }
    });

  });
</script>

<script>
      $(document).ready(function() {

        $('.chart').easyPieChart({
          easing: 'easeOutElastic',
          delay: 3000,
          barColor: '#26B99A',
          trackColor: '#fff',
          scaleColor: false,
          lineWidth: 20,
          trackWidth: 16,
          lineCap: 'butt',
          onStep: function(from, to, percent) {
            $(this.el).find('.percent').text(Math.round(percent));
          }
        });
        var chart = window.chart = $('.chart').data('easyPieChart');
        $('.js_update').on('click', function() {
          chart.update(Math.random() * 200 - 100);
        });

        //hover and retain popover when on popover content
        var originalLeave = $.fn.popover.Constructor.prototype.leave;
        $.fn.popover.Constructor.prototype.leave = function(obj) {
          var self = obj instanceof this.constructor ?
            obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type);
          var container, timeout;

          originalLeave.call(this, obj);

          if (obj.currentTarget) {
            container = $(obj.currentTarget).siblings('.popover');
            timeout = self.timeout;
            container.one('mouseenter', function() {
              //We entered the actual popover – call off the dogs
              clearTimeout(timeout);
              //Let's monitor popover content instead
              container.one('mouseleave', function() {
                $.fn.popover.Constructor.prototype.leave.call(self, self);
              });
            });
          }
        };

        $('body').popover({
          selector: '[data-popover]',
          trigger: 'click hover',
          delay: {
            show: 50,
            hide: 400
          }
        });
      });
    </script>
    <!-- easy-pie-chart -->