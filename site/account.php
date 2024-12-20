<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Complex</title>
    <link rel="stylesheet" href="./css/main.css">
    <script src="js/javascript.js"></script>
    <style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f5f5f5;
		}
		h1 {
			text-align: center;
			margin: 50px 0;
		}
		i{
			text-align: center;
		}
		.container_choice {
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
		}
		label {
			display: block;
			margin-bottom: 10px;
		}
		input[type="checkbox"] {
			margin-right: 10px;
		}
		.warning {
			color: red;
			font-size: 14px;
			margin-top: 10px;
		}
		.price {
			margin-top: 10px;
			font-weight: bold;
			font-size: 20px;
		}
		.congrat{
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
		}
		b{
			background-color: black;
			color: white;
			padding: 2px 2px;
			border-radius: 5px;
		}
		input[type="submit"]{
			margin:15px 340px;
		}
		.scrollNum{
			display:inline-block;
			margin:0px 6px;
		}
		#zero{
			margin:0px 7px 0px 195px;
		}
	</style>
</head>
<body>
	<?php if($_COOKIE['user']==''):?>
		Будь-ласка зареєструйтесь або ввійдіть у аккаунт за <a href="form.php" style="color:blue;"> посиланням</a>
	<?php else: ?>
		<nav class="nav">
        <div class="container">
            <div class="nav-row">
                <a href="./index.html" class="logo"><strong>Sport</strong> Complex</a>
                <ul class="nav-list">
                    <li class="nav-list__item"><a href="./membership.html" class="nav-list__link">Картка членства</a></li>
                    <li class="nav-list__item"><a href="./coach.html" class="nav-list__link">Тренери</a></li>
                    <li class="nav-list__item"><a href="./account.php" class="nav-list__link">Кабінет</a></li>
                </ul>
            </div>
        </div>
    </nav>
		<p class="congrat">Привіт, <b><?=$_COOKIE['user']?></b> </p>

	<div class="container_choice">
		<h1>Оберіть спортивні послуги</h1>
	<form id="myForm" method="POST" action="insert_data.php">
		<p>Оберіть послугу та повзунком обирайте кількість відвідувань секції(від 0 до 7 днів на тиждень)</p>
  <div class="scrollNum" id='zero'>0</div>
  <div class="scrollNum">1</div>
  <div class="scrollNum">2</div>
  <div class="scrollNum">3</div>
  <div class="scrollNum">4</div>
  <div class="scrollNum">5</div>
  <div class="scrollNum">6</div>
  <div class="scrollNum">7 днів</div>
  <label>
    <input type="checkbox" name="services[]" id="gym" data-price="100" service_name="Фітнес-зал">
    <input type="hidden" id="price0" name="price0" value="">
  </label>
  <label>
    <input type="checkbox" name="services[]" id="pool" data-price="200" service_name="Басейн">
    <input type="hidden" id="price1" name="price1" value="">
  </label>
  <label>
    <input type="checkbox" name="services[]" id="yoga" data-price="90" service_name="Йога">
    <input type="hidden" id="price2" name="price2" value="">
  </label>
  <label>
    <input type="checkbox" name="services[]" id="dance" data-price="50" service_name="Тренажерний зал">
    <input type="hidden" id="price3" name="price3" value="">
  </label>
  <label>
    <input type="checkbox" name="services[]" id="boxing" data-price="120" service_name="Масаж">
    <input type="hidden" id="price4" name="price4" value="">
  </label>
  <label>
    <input type="checkbox" name="services[]" id="pilates" data-price="100" service_name="Спортивні ігри">
    <input type="hidden" id="price5" name="price5" value="">
  </label>
  <label><input type="submit" value="Підтвердити"></label>
</form>
  
	<i>Спорт-комплекс працює кожен день з 9 до 21 години</i>
	<script>
		const poolCheckbox = document.getElementById("pool");
  		poolCheckbox.addEventListener("change", () => { //вибір басейну
    		if (poolCheckbox.checked) {
     			 alert("Для відвідування басейну необхідна медична картка");
    		} else {
      			alert("Ви відмінили вибір басейну!");
    		}
  		});
///////////////////////

const services = document.querySelectorAll('input[name="services[]"]');

for (let i = 0; i < services.length; i++) {
  const checkbox = services[i];
  const priceInput = document.createElement('input');
  priceInput.value = checkbox.getAttribute('service_name');
  priceInput.disabled = true; // disable by default
  checkbox.parentNode.insertBefore(priceInput, checkbox.nextSibling);

  const priceRange = document.createElement('input');
  priceRange.type = 'range';
  priceRange.min = 0;
  priceRange.max = 7;
  priceRange.disabled = true; // disable by default
  priceRange.setAttribute('name', `price_range_${i}`);
  checkbox.parentNode.insertBefore(priceRange, priceInput.nextSibling);

  const priceDisplay = document.createElement('span');
  priceDisplay.setAttribute('id', `price_${i}`);
  priceDisplay.setAttribute('name', `price_${i}`);

  checkbox.parentNode.insertBefore(priceDisplay, priceRange.nextSibling);//відображення вартості

  priceRange.addEventListener('input', () => {
    const price = (priceRange.value * checkbox.getAttribute('data-price')).toFixed(2);
    priceDisplay.textContent = `${price} грн.`;
    priceInputG.value = price;
  });

  checkbox.addEventListener('change', () => { //повзунок з'являється, якщо чекбокс активний'
    priceRange.disabled = !checkbox.checked;
    priceInput.disabled = !checkbox.checked; // enable if checked
    if (!checkbox.checked) {
      priceRange.value = checkbox.getAttribute('data-price');
      priceInput.value = checkbox.getAttribute('data-price');
      priceDisplay.textContent = `${priceRange.value}`;
    }
  });
}
	</script>
	</div>
  <?php endif; ?>
</body>
</html>