<?php /* Template Name: LP Inglés intensivo*/ ?>
<?php get_header(); ?>
<head><LINK REL=StyleSheet HREF="http://englishathomeperu.com/wp-content/themes/eah/css/bootstrap.min.css" TYPE="text/css" MEDIA=screen>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<style type="text/css">

	header{
		display: none;
	}
	#top-header{
		position: inherit!important;
	}
	.probando{
		height: 900px;
	}
	.col-md-1,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7{
		position: sticky!important;
	}
	.imagendefondo{
		    background-image: url(http://englishathomeperu.com/wp-content/uploads/2017/09/negocios1-1.jpg);
    color: white;
    background-size: cover;
            height: 570px;
	}
	.imagendefondo2{
		   
        height: 100%;
	}
	
	
	.textura2{
		         background: rgba(6, 6, 6, 0.45);
		         height: 100%;
	}
	.titulolp{
	    font-size: 50px;
    color: #0e4f8f;
    font-weight: 600;
    margin-top: 10px;
    margin-bottom: 0px;
    text-align: center;
	}
	.subtitulolp{
		text-align: center;
		    color: #0e4f8f;
    font-size: 30px;
	}
	#seccion1{
		margin-top: 10px;
	}
	.texto1{
		display: table;
	}
	.texto2{
		display: table-cell;
		    vertical-align: bottom;
		height: 560px;
	}.texto3{
		font-size: 46px;
    line-height: 1.1;
    text-shadow: 1px 1px rgba(62, 62, 62, 0.81);
    padding-bottom: 20px;
	}
	.texto4{
		    font-size: 28px;
    text-shadow: -2px -2px 2px #333, 2px -2px 2px #333, -2px 2px 2px #333, 2px 2px 2px #333;
}
	h3.title-formulario:before{
		background: #0862e8!important;
	}
	#seccion3{
		margin-top: 40px;
    margin-bottom: 40px;
	}
	.testructura{
		    text-align: center;
    font-size: 40px;
    color: #0e4f8f;
    font-weight: 600;
    margin-bottom: 20px;
	}
	.separador{
		    margin-top: 10px;
    background-color: #0e4f8f;
    height: 1px;
    width: 50px;
        position: relative;
    display: block;
    margin: 10px auto 40px auto;
	}
	p{
		font-size: 20px;
	}
	#seccion4{
		background: #e8e8e8;
	    padding-top: 40px;
    padding-bottom: 40px;
	}
	#seccion4 ul li{
		    display: inline-block;
		        padding: 5px;

	}
	#seccion4 h3{
		text-align: center;
		color: #0e4f8f;
		    padding-top: 5px;
	}
	#seccion5{
		margin-top: 40px;
    margin-bottom: 40px;
	}
	.botonlp{
	    font-size: 30px;
    width: 200px;
    text-align: center;
    color: white;
    border: 1px solid;
	}

	
	.middle{
		    
    display: table-cell;
    vertical-align: middle;
    height: 100px;
	}
	.tmiddle{
	    display: table-cell;
    vertical-align: middle;
    height: 100px;
    text-align: center;
	}
	.tmiddle p{
		    text-align: center;
    font-size: 26px;
	}
	@media screen and (max-width: 991px) {
    .titulolp, .logo {
        text-align: center;
    }
}
.formstyle div {
	background: #0862e8!important;
	    max-width: 330px!important;
}
.formstyle h3.title-formulario{
	   padding: 30px 0px 10px 0px!important;
	        line-height: 10px!important;
	            font-size: 26px!important;
	            display: none;

}
.wpcf7-form-control{
	    background-color: white!important;
}
.wpcf7-submit{
		    background-color: #e20a16 !important;
		    font-size: 22px!important;
		    border: none!important;
	}
.formstyle p{
	    padding-bottom: 10px!important;
}
.tituloform{
	    display: block;
    margin: 0 auto;
        text-align: center;
    font-size: 30px;
    padding-top: 20px;
}
.wpcf7-form-control-wrap{
	margin-bottom: 20px;
}
.cta{
	height: 100px;
	margin-top: 50px;
	background-color: #004c9e;
    background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zd…0iMTAwJSIgc3R5bGU9ImZpbGw6IHVybCgjbGluZWFyLWdyYWRpZW50KTsiLz4NCjwvc3ZnPg==);
    background-image: -moz-linear-gradient(top, #05386b, #004c9e);
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#05386b), to(#004c9e));
    background-image: -webkit-linear-gradient(top, #05386b, #004c9e);
    background-image: -o-linear-gradient(top, #05386b, #004c9e);
    background-image: linear-gradient(to bottom, #05386b, #004c9e);
    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#05386b', endColorstr='#004c9e');
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#05386b', endColorstr='#004c9e')";
    background-repeat: repeat-x;
    border-style: solid;
    border-width: 1px;
    border-color: #0b345c;
    color: white;
}
.shadow img{
	    margin-top: -1px;
}
.wpcf7-textarea{
	height: 53px !important;
}
@media screen and (max-width: 991px) {
    .imagendefondo {
        background-size: 100% 25%;
    background-repeat: no-repeat;
        height: 100%;
    }
}
@media screen and (max-width: 600px) {
    .imagendefondo {
        background-size: 100% 15%;
    background-repeat: no-repeat;
        height: 100%;
    }
}

@media screen and (max-width: 991px) {
    .formstyle {
        margin-top: 40%;
    }
}
@media screen and (max-width: 760px) {
    .formstyle {
        margin-top: 50%;
    }
}
@media screen and (max-width: 991px) {
    .texto2 {
        display: block;
    vertical-align: top;
    height: 100%;
    text-align: center;
    margin-top: 40px;
    }
}
@media screen and (max-width: 991px) {
    .cta {
        height: 100%;
    }
}
@media screen and (max-width: 991px) {
    .botonlp {
       display: block;
    margin: 0 auto;
    }
}

@media screen and (max-width: 991px) {
    .middle {
       margin-bottom: 20px;
       display: block;
    vertical-align: bottom;
    height: 100%;
    }
}
@media screen and (max-width: 991px) {
    #seccion3 img{
      display: block;
    margin: 0 auto;
        padding-top: 20px;
    }
}
@media screen and (max-width: 991px) {
    .separador{
          margin: 10px auto 20px auto;
    }
}
@media screen and (max-width: 991px) {
    .iconos1{
          text-align: center;
    }
}
@media screen and (max-width: 991px) {
    .iconos2{
          display: block;
    margin: 0 auto;
    }
}
@media screen and (max-width: 991px) {
    .container{
          width: 100%;
    }
}
@media screen and (max-width: 615px) {
    .titulolp{
              font-size: 40px;
    }
}
</style>
<div id="seccion1">
	<div class="container">
		<div class="col-md-4 logo">
			<img src="http://englishathomeperu.com/wp-content/uploads/2017/07/eah_logo.png">
		</div>
		<div class="col-md-8">
			<h1 class="titulolp">Clases Intensivas de Inglés</h1>
			<h2 class="subtitulolp">Donde y cuando quieras</h2>
		</div>
	</div>
</div>

<div id="seccion2">
	<div class="imagendefondo">
		
			<div class="container">

				<div class="col-md-5">
					<div class="formstyle">
					<div class="tituloform">¡Contáctanos ya!</div>
						<?php echo do_shortcode( '[eah_formulario_interesado]' ); ?>
					</div>
				</div>

				<div class="col-md-7">
					<div class="texto2">
					
						<div class="texto4">
							<ul>
								<li>- Clases adaptadas a tus necesidades.</li>
								<li>- Profesores de Inglés altamente calificados.</li>
								<li>- Elige el Horario de tu preferencia.</li>
								<li>- Planifica tus clases en tu casa u oficina.</li>
								<li>- Metodología 100% comunicativa.</li>
							</ul>
						</div>
					</div>		
				</div>

				
			</div>
			
	</div>	
</div>

<div id="seccion3">
	<div class="container">
	<h2 class="testructura">Estructura</h2>
	<div class="separador"></div>
		<div class="col-md-6">
			<p>Programa de Inglés diseñado para adquirir las competencias en el idioma Inglés de una manera rápida desarrollando las 4 habilidades (Listening, Reading, Speaking and Writing) de una manera activa y práctica.
			</p>
		</div>
		<div class="col-md-6">
			<img src="http://englishathomeperu.com/wp-content/uploads/2017/08/eah_cursos_niveles.png">
		</div>
	</div>
</div>

<div id="seccion4">
	<div class="container">
	<h2 class="testructura">Metodología</h2>
	<div class="separador"></div>
		<div class="col-md-6 col-md-push-6">
		<p>Nuestra Metodología ´Learning by Doing´permite que el alumno participe activamente de su propio aprendizaje poniendo en práctica las estructuras correctas y ampliando su vocabulario a la vez que mejora su habilidad auditiva, de lectura y de escritura.
			</p>
			
		</div>

		<div class="col-md-6 col-md-pull-6">
		<ul class="iconos1">
			<li>
				<img src="http://englishathomeperu.com/wp-content/uploads/2017/08/eah_icono_listening.png"><br>
				<h3>Listening</h3>
			</li>
			<li>	
				<img src="http://englishathomeperu.com/wp-content/uploads/2017/08/eah_icono_reading.png"><br>
				<h3>Reading</h3>
			</li>
			<li>	
				<img src="http://englishathomeperu.com/wp-content/uploads/2017/08/eah_icono_writing.png"><br>
				<h3>Writing</h3>
			</li>
			<li>	
				<img src="http://englishathomeperu.com/wp-content/uploads/2017/08/eah_icono_speaking.png"><br>
				<h3>Speaking</h3>
			</li>
		</ul>	
		</div>
	</div>
</div>

<div id="seccion5">
	<div class="container">
	<h2 class="testructura">Adaptabilidad</h2>
	<div class="separador"></div>
		<div class="col-md-6">
			<p>Nuestro programa puede ser adaptado en enfoque y duración. Enfatizando más la producción oral, auditiva o de lectura y escritura así como aumentando o reduciendo el número de horas para de ese modo adecuarnos a las necesidades específicas de cada uno de nuestros alumnos.
			</p>
		</div>
		<div class="col-md-6">
			<img class="iconos2" src="http://englishathomeperu.com/wp-content/uploads/2017/07/eah_american_english_file_2.png">
		</div>
	</div>
</div>

<div id="seccion6">
			<div class="container">
				<div class="cta">
					<div class="col-md-9">
							<div class="tmiddle">
								<p>Esta es la solución ideal para ti, ... ¿Qué esperas para solicitar información?
								</p>
							</div>
					</div>
					<div class="col-md-3">
							<div class="middle">
							<a href="#seccion1">
								<div class="botonlp">Contáctanos</div>
							</a>	
							</div>
					</div>
					
				</div>
				<div class="shadow">
						<img src="http://englishathome.pe/wp-content/themes/envision/includes/modules/module.shadow/shadows/shadow-2.png">
					</div>

			</div>	
</div>

<?php get_footer(); ?>
