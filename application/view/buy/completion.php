<? 
$this->payerDetails = $payerDetails;

print_r($this->payerDetails);

echo '<h1> Buyer Details </h1>';
echo '<br>' . $payerDetails['FirstName'];
echo '<br>' . $payerDetails['LastName'];
echo '<br>' . $payerDetails['PayPalId'];
echo '<br>' . $payerDetails['Email'];

echo '<h1> Delivery Address </h1>';
echo '<br>' . $payerDetails['AddressLine1'];
echo '<br>' . $payerDetails['AddressLine2'];
echo '<br>' . $payerDetails['AddressCity'];
echo '<br>' . $payerDetails['AddressCountryCode'];
echo '<br>' . $payerDetails['AddressPostalCode'];









