<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
       <h1>Paymen page</h1>
     <div id="paypal-button-container"></div>


    <script src="https://www.paypal.com/sdk/js?client-id=AeBn97n7hogUs5SP4hDTeqtw1aMVisxIzkCAizQusH6nlQm9iIqf8r729ZfnMxNcmTSktB5IbX5JyM9k">
</script>

     <script>
        
      paypal.Buttons({
       
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '30'
                    }
                }]
            });
        },
        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
                alert('Transaction complétée par ' + details.payer.name.given_name + '!');
            });
        },
        onError: function(err){
            console.log("erreur dans le paiement",err);
            alert("paiement échoué");
        }

    }).render('#paypal-button-container').then(function () {
 
    });
    </script>

</body>
</html>