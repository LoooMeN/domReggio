<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('header.php'); ?>
    <link rel="stylesheet" href="../sass/cooker.css">
    <title>Кухня</title>
</head>

<script>

    var products = [['Молоко', 'гр.'], ['Сахар', 'гр.']];

</script>

<body>
    <div class="mainContainer">
        <h1>Учёт продуктов</h1>
        <div class="flexRowLeft">
            <h2 id="1" class="tabTrigger">Закупка</h2>
            <h2 id="2" class="tabTrigger">Списание</h2>
        </div>
        <div id="tab1" class="zakupka">
            <script>
                var parent = document.querySelector('.zakupka');
                products.forEach(element => {
                    var holder = document.createElement('div');
                    holder.classList.add('productZakupka', 'flexRowLeft');

                    holder.innerHTML = '<p>'+element[0]+'</p><input type="text" name="value'+element[0]+'"><p>'+element[1]+'</p>';
                    parent.appendChild(holder);
                });
            </script>
            <input type="button" id='submitZakupka' class="zakupkaButton" value="отправить">
        </div>
        <div id="tab2" class="spisanie">
            
        </div>
    </div>

    <script>
        var submitZakupka = document.querySelector('#submitZakupka');

        function zakupkaRequest() {
            var productList = document.querySelectorAll('.productZakupka');
            productList.forEach(elem => {
                elem = elem.childNodes;
                if (elem[1].value)
                {
                    console.log(elem[0].innerText); // productName
                    console.log(elem[1].value); // prodValue
                    console.log(elem[2].innerText); // prodMeasurement
                    var requestHandler = 'function.php?type="zakupka"&productName="'+elem[0].innerText+'"&prodValue="'+elem[1].value+'"';
                    axios.get(requestHandler);
                    elem[1].value = '';
                }
            });
        }

        submitZakupka.addEventListener('click', zakupkaRequest);

    </script>

</body>
</html>