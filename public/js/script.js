$(function () {
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  });

  $(".kt_default_datatable").DataTable({
    responsive: true,
    paging: false,
    info: false,
    lengthChange: false,
    autoWidth: false,
    order: [],
  });

  $(".kt_datatable_responsive").DataTable({
    responsive: true,
    lengthChange: true,
    autoWidth: false,
    order: [],
  });

  let dynamicSearchTable = $(".kt_datatable_dynamic_search").DataTable();

  $("[data-kt-filter='search']").on("keyup", function () {
    dynamicSearchTable.search(this.value).draw();
  });

  // function to disabled button submit on form that you submitted
  // you must create class="form" on your form element
  $(".form").on("submit", function () {
    $(this)
      .find(":submit")
      .html(
        "<span class='spinner-border spinner-border-sm align-middle ms-2'></span>"
      )
      .prop("disabled", true);
  });
  // end of function
});

$(".numeric").numeric({});
$(".positive-numeric").numeric({
  negative: false,
}); // do not allow negative values

$(".text-uppercase").on("keyup", function () {
  this.value = this.value.toUpperCase();
}); // force value to upper

$(".text-uppercase").on("change", function () {
  this.value = this.value.toUpperCase();
}); // force value to upper

$(".text-lowercase").on("keyup", function () {
  this.value = this.value.toLowerCase();
}); // force value to lower

$(".text-lowercase").on("change", function () {
  this.value = this.value.toLowerCase();
}); // force value to lower

// formatting value to indonesian currency
// ex rupiahIndonesia.format(100000)
// output : Rp 100.000,00
const rupiahIndonesia = new Intl.NumberFormat("id-ID", {
  style: "currency",
  currency: "IDR",
});

// single datePicker
$("#kt_default_daterangepicker").daterangepicker({
  singleDatePicker: true,
  showDropdowns: true,
  autoUpdateInput: false,
  locale: {
    cancelLabel: "Clear",
    format: "YYYY-MM-DD",
    monthNames: [
      "Januari",
      "Februari",
      "Maret",
      "April",
      "Mei",
      "Juni",
      "Juli",
      "Agustus",
      "September",
      "Oktober",
      "November",
      "Desember",
    ],
  },
});

$("#kt_default_daterangepicker").on(
  "apply.daterangepicker",
  function (ev, picker) {
    $(this).val(picker.startDate.format("YYYY-MM-DD"));
  }
);

$("#kt_default_daterangepicker").on(
  "cancel.daterangepicker",
  function () {
    $(this).val('');
  }
);
