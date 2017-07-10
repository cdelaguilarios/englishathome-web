(function ($) {
  function elementoCargadoCursosContenidos(e, fr) {
    window.setTimeout(function () {
      if ($(e).length) {
        fr();
      } else {
        elementoCargadoCursosContenidos(e, fr);
      }
    }, 500);
  }

  //EAH - Cursos contenidos
  elementoCargadoCursosContenidos(".eah-cursos-contenidos", function () {
    $(".eah-cursos-contenidos").find(".selecionar-imagen-eah-cursos-contenidos").live("click", function () {
      var nro = $(this).data("nro");
      var eleActual = $(this).closest(".eah-cursos-contenidos");
      wp.media.editor.send.attachment = function (props, imagen) {
        var id = imagen.id;
        var url = imagen.url;
        if (typeof imagen.sizes.thumbnail !== 'undefined') {
          url = imagen.sizes.thumbnail.url;
        }
        $(eleActual).find("tbody").find("tr:eq(" + (nro * 3) + ")").find("td:eq(1)").find("img").remove();
        $(eleActual).find("tbody").find("tr:eq(" + (nro * 3) + ")").find("td:eq(1)").append('<img src="' + url + '" data-id="' + id + '" width="40">');
        $(eleActual).find(".eah-cursos-contenidos-titulo:eq(0)").trigger("change");
      };
      wp.media.editor.open($(this), function () {});
    });
    $(".eah-cursos-contenidos").find(".agregar-eah-cursos-contenidos").click(function () {
      var eleActual = $(this).closest(".eah-cursos-contenidos");
      var auxEle = $(eleActual).find("tbody").find("tr:eq(0)").clone();
      auxEle.find("button:eq(0)").data("nro", ($(eleActual).find("tbody").find("tr").length / 3));
      auxEle.find("img").remove();
      auxEle.appendTo($(eleActual).find("tbody")).find("input[type='hidden']").val("");
      
      
      $(eleActual).find("tbody").find("tr:eq(1)").clone().appendTo($(eleActual).find("tbody")).find("input[type='text']").val("");
      $(eleActual).find("tbody").find("tr:eq(2)").clone().appendTo($(eleActual).find("tbody")).find("input[type='text']").val("");
      $(eleActual).find(".remover-eah-cursos-contenidos").show();
    });
    $(".eah-cursos-contenidos").find(".remover-eah-cursos-contenidos").click(function () {
      var eleActual = $(this).closest(".eah-cursos-contenidos");
      if ($(eleActual).find("tbody").find("tr").length > 4) {
        $(eleActual).find("tbody").find("tr:last").remove();
        $(eleActual).find("tbody").find("tr:last").remove();
        $(eleActual).find("tbody").find("tr:last").remove();
        if ($(eleActual).find("tbody").find("tr").length === 3) {
          $(eleActual).find(".remover-eah-cursos-contenidos").hide();
        }
        $(eleActual).find(".eah-cursos-contenidos-titulo:eq(0)").trigger("change");
      }
    });
    $(".eah-cursos-contenidos").find(".eah-cursos-contenidos-titulo, .eah-cursos-contenidos-descripcion").live("keypress keyup change", function () {
      var eleActual = $(this).closest(".eah-cursos-contenidos");
      var total = $(eleActual).find("tbody").find("tr").length;
      var contenidoFinal = "";
      for (var i = 0; i < (total / 2); i++) {
        var idImagen = $(eleActual).find("tbody").find("tr:eq(" + (i * 3) + ")").find("img").data("id");
        var urlImagen = $(eleActual).find("tbody").find("tr:eq(" + (i * 3) + ")").find("img").attr("src");
        var titulo = $(eleActual).find("tbody").find("tr:eq(" + ((i * 3) + 1) + ")").find(".eah-cursos-contenidos-titulo").val();
        var descripcion = $(eleActual).find("tbody").find("tr:eq(" + ((i * 3) + 2) + ")").find(".eah-cursos-contenidos-descripcion").val();
        if (idImagen !== undefined && idImagen !== "" && urlImagen !== undefined && urlImagen !== "" && titulo !== undefined && titulo !== "" && descripcion !== undefined && descripcion !== "") {
          contenidoFinal += "[[idImagen:" + idImagen + "][urlImagen:" + urlImagen + "][titulo:" + titulo + "][descripcion:" + descripcion + "]]";
        }
      }
      $(eleActual).find("input[type='hidden']:eq(0)").val(contenidoFinal);
    });
    $(".eah-cursos-contenidos").each(function (e, v) {
      var eleActual = $(this).closest(".eah-cursos-contenidos");
      var datosActuales = $(eleActual).find("input[type='hidden']:eq(0)").val();
      var regExp = /\[\[idImagen:(.*?)\]\[urlImagen:(.*?)\]\[titulo:(.*?)\]\[descripcion:(.*?)\]\]/g;
      var auxCont = 0;
      while (datos = regExp.exec(datosActuales)) {
        if (datos.length === 5) {
          if (auxCont > 0) {
            $(eleActual).find(".agregar-eah-cursos-contenidos").trigger("click");
          }
          $(eleActual).find("tbody").find("tr:eq(" + (auxCont * 3) + ")").find("td:eq(1)").append('<img src="' + datos[2] + '" data-id="' + datos[1] + '" width="40">');
          $(eleActual).find("tbody").find("tr:eq(" + ((auxCont * 3) + 1) + ")").find(".eah-cursos-contenidos-titulo").val(datos[3]);
          $(eleActual).find("tbody").find("tr:eq(" + ((auxCont * 3) + 2) + ")").find(".eah-cursos-contenidos-descripcion").val(datos[4]);
          auxCont++;
        }
      }
      $(eleActual).show();
    });
  });
})(jQuery);