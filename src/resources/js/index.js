//リアルタイムバリデーション
$('.postcode').on('change', function () {
  this.reportValidity();
});