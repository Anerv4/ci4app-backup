<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<title><?= $title; ?></title>

<!-- Bootstrap core CSS -->
<link href="/cyborgAssets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<!-- Additional CSS Files -->
<link rel="stylesheet" href="/cyborgAssets/assets/css/fontawesome.css">
<link rel="stylesheet" href="/cyborgAssets/assets/css/templatemo-cyborg-gaming.css">
<link rel="stylesheet" href="/cyborgAssets/assets/css/owl.css">
<link rel="stylesheet" href="/cyborgAssets/assets/css/animate.css">
<link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
<link rel="stylesheet" href="/animeAssets/css/elegant-icons.css" type="text/css">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/> -->

<!--

TemplateMo 579 Cyborg Gaming

https://templatemo.com/tm-579-cyborg-gaming

-->
<!-- Css Anime Template Styles -->
<link rel="stylesheet" href="animeAssets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="animeAssets/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="animeAssets/css/elegant-icons.css" type="text/css">
<link rel="stylesheet" href="animeAssets/css/plyr.css" type="text/css">
<!-- Halobang ini tak komen gegara ini yang bikin double somevalue -->
<!-- <link rel="stylesheet" href="animeAssets/css/nice-select.css" type="text/css"> -->
<link rel="stylesheet" href="animeAssets/css/owl.carousel.min.css" type="text/css">
<link rel="stylesheet" href="animeAssets/css/slicknav.min.css" type="text/css">
<link rel="stylesheet" href="animeAssets/css/style.css" type="text/css">
<style>
  .multiselect {
  width: 100%;
  }

  .selectBox {
  position: relative;
  }

  .selectBox select {
  width: 100%;
  }

  .overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  }

  #mySelectOptions {
  display: none;
  border: 0.5px #7c7c7c solid;
  background-color: #ffffff;
  max-height: 150px;
  overflow-y: scroll;
  }

  #mySelectOptions label {
  display: block;
  font-weight: normal;
  display: block;
  white-space: nowrap;
  min-height: 1.2em;
  background-color: #ffffff00;
  padding: 0 2.25rem 0 .75rem;
  /* padding: .375rem 2.25rem .375rem .75rem; */
  }

  #mySelectOptions label:hover {
  background-color: #1e90ff;
  }
</style>
</head>
<body>

  <!-- ***** Preloader Start ***** -->
  <!-- <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div> -->
    <!-- ***** Preloader End ***** -->

    <!-- memanggil navbar dengan cara parsial -->
    <?= $this->include('layout/navbar'); ?>
  

    <!-- mencetak section yang nanti section kita ambil dari halaman yang memanggil template ini -->
    <?= $this->renderSection('content'); ?> <!-- nama parameter bebas -->

    
    <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">Cyborg Gaming</a> Company. All rights reserved. 
          
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a>  Distributed By <a href="https://themewagon.com" target="_blank" >ThemeWagon</a></p>
        </div>
      </div>
    </div>
  </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="/cyborgAssets/vendor/jquery/jquery.min.js"></script>
    <script src="/cyborgAssets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="/cyborgAssets/assets/js/isotope.min.js"></script>
    <script src="/cyborgAssets/assets/js/owl-carousel.js"></script>
    <script src="/cyborgAssets/assets/js/tabs.js"></script>
    <script src="/cyborgAssets/assets/js/popup.js"></script>
    <script src="/cyborgAssets/assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script> -->

    <!-- Swwet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/myscript.js"></script>

    <!-- Js Anime Template Plugins -->
    <script src="/animeAssets/js/jquery-3.3.1.min.js"></script>
    <script src="/animeAssets/js/bootstrap.min.js"></script>
    <script src="/animeAssets/js/player.js"></script>
    <!-- Halobang ini tak komen gegara yang bikin double somevalue -->
    <!-- <script src="/animeAssets/js/jquery.nice-select.min.js"></script> -->
    <script src="/animeAssets/js/mixitup.min.js"></script>
    <script src="/animeAssets/js/jquery.slicknav.js"></script>
    <script src="/animeAssets/js/owl.carousel.min.js"></script>
    <script src="/animeAssets/js/main.js"></script>
    
    <script>
      function previewImg() {
        const sampul = document.querySelector('#sampul');
        const sampulLabel = document.querySelector('.form-control');
        const imgPreview = document.querySelector('.img-preview');
  
        sampulLabel.textContent = sampul.files[0].name;
  
        const fileSampul = new FileReader();
        fileSampul.readAsDataURL(sampul.files[0]);
  
        fileSampul.onload = function(e) {
          imgPreview.src = e.target.result;
        }
        
      }

      // genre dropdown 
	// window.onload = (event) => {
	// 	initMultiselect();
	//   };
	  
	//   function initMultiselect() {
	// 	checkboxStatusChange();
	  
	// 	document.addEventListener("click", function(evt) {
	// 	  var flyoutElement = document.getElementById('myMultiselect'),
	// 		targetElement = evt.target; // clicked element
	  
	// 	  do {
	// 		if (targetElement == flyoutElement) {
	// 		  // This is a click inside. Do nothing, just return.
	// 		  //console.log('click inside');
	// 		  return;
	// 		}
	  
	// 		// Go up the DOM
	// 		targetElement = targetElement.parentNode;
	// 	  } while (targetElement);
	  
	// 	  // This is a click outside.
	// 	  toggleCheckboxArea(true);
	// 	  //console.log('click outside');
	// 	});
	//   }
	  
	//   function checkboxStatusChange() {
	// 	var multiselect = document.getElementById("mySelectLabel");
	// 	var multiselectOption = multiselect.getElementsByTagName('option')[0];
	  
	// 	var values = [];
	// 	var checkboxes = document.getElementById("mySelectOptions");
	// 	var checkedCheckboxes = checkboxes.querySelectorAll('input[type=checkbox]:checked');
	  
	// 	for (const item of checkedCheckboxes) {
	// 	  var checkboxValue = item.getAttribute('value');
	// 	  values.push(checkboxValue);
	// 	}
	  
	// 	var dropdownValue = "Nothing is selected";
	// 	if (values.length > 0) {
	// 	  dropdownValue = values.join(', ');
	// 	}
	  
	// 	multiselectOption.innerText = dropdownValue;
	//   }
	  
	//   function toggleCheckboxArea(onlyHide = false) {
	// 	var checkboxes = document.getElementById("mySelectOptions");
	// 	var displayValue = checkboxes.style.display;
	  
	// 	if (displayValue != "block") {
	// 	  if (onlyHide == false) {
	// 		checkboxes.style.display = "block";
	// 	  }
	// 	} else {
	// 	  checkboxes.style.display = "none";
	// 	}
	//   }

  /**
   ********* 
   * dropdown genre as u
   *********
   */
  var expanded = false;

// Halobang ini tak komen

// function showCheckboxes() {
//   var checkboxes = document.getElementById("checkboxes");
//   if (!expanded) {
//     checkboxes.style.display = "block";
//     expanded = true;
//   } else {
//     checkboxes.style.display = "none";
//     expanded = false;
//   }
// }

    // Halobang ini tak tambahin
    window.onload = (event) => {
        initMultiselect();
    };

    function initMultiselect() {
        checkboxStatusChange();

        document.addEventListener("click", function(evt) {
            var flyoutElement = document.getElementById('myMultiselect'),
            targetElement = evt.target; // clicked element

            do {
                if (targetElement == flyoutElement) {
                    // This is a click inside. Do nothing, just return.
                    //console.log('click inside');
                    return;
                }

                // Go up the DOM
                targetElement = targetElement.parentNode;
            } while (targetElement);

            // This is a click outside.
            toggleCheckboxArea(true);
            //console.log('click outside');
        });
    }

    function checkboxStatusChange() {
        var multiselect = document.getElementById("mySelectLabel");
        var multiselectOption = multiselect.getElementsByTagName('option')[0];

        var values = [];
        var checkboxes = document.getElementById("mySelectOptions");
        var checkedCheckboxes = checkboxes.querySelectorAll('input[type=checkbox]:checked');

        for (const item of checkedCheckboxes) {
            var checkboxValue = item.getAttribute('value');
            values.push(checkboxValue);
        }

        var dropdownValue = "Nothing is select";
        if (values.length > 0) {
            dropdownValue = values.join(', ');
        }

        multiselectOption.innerText = dropdownValue;
    }

    function toggleCheckboxArea(onlyHide = false) {
        var checkboxes = document.getElementById("mySelectOptions");
        var displayValue = checkboxes.style.display;

        if (displayValue != "block") {
            if (onlyHide == false) {
                checkboxes.style.display = "block";
            }
        } else {
            checkboxes.style.display = "none";
        }
    }


    </script>
  </body>
</html>