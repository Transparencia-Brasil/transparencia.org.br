function onSubmitRecaptcha(token) {
  var formId = $('#grecaptcha-btn').attr("data-formid");
  var action = $('#grecaptcha-btn').attr("data-actionOrigem");

  console.log("submit")
  console.log(token)
  $(formId).prepend(
    '<input type="hidden" name="token" value="' + token + '">'
  );

  $(formId).prepend(
    '<input type="hidden" name="actionOrigem" value="' + action + '">'
  );

  $(formId).submit();
}

function onSubmitRecaptchaNewsltter(token) {
  var formId = $('#grecaptcha-btn-news').attr("data-formid");
  var action = $('#grecaptcha-btn-news').attr("data-actionOrigem");

  $(formId).prepend(
    '<input type="hidden" name="token" value="' + token + '">'
  );

  $(formId).prepend(
    '<input type="hidden" name="actionOrigem" value="' + action + '">'
  );

  $(formId).submit();
}