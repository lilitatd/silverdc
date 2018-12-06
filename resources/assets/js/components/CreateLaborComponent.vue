<template>
<div class="modal fade" id="addLabor" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Labor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		<div class="modal-body">
			<form @submit.prevent="saveLabor">
			<div class="form-group">
				<label>Código</label>
				<input type="text" class="form-control" placeholder="Ingresa el código de la Labor" v-model="codigo">
			</div>
			<div class="form-group">
				<label>Tipo</label>
				<input type="text" class="form-control" placeholder="Ingresa el tipo" v-model="tipo">
			</div>
			<div class="form-group">
				<label>Nivel</label>
				<input type="text" class="form-control" placeholder="Ingresa el nivel" v-model="nivel">
			</div>
			<div class="form-group">
				<label>Veta</label>
				<input type="text" class="form-control" placeholder="Ingresa la veta" v-model="veta">
			</div>
			<div class="form-group">
				<label>Ancho</label>
				<input type="text" class="form-control" placeholder="Ingresa el ancho" v-model="ancho">
			</div>
			<div class="form-group">
				<label>Alto</label>
				<input type="text" class="form-control" placeholder="Ingresa el alto" v-model="alto">
			</div>
           <!-- $table->integer('nroTaladros');
            $table->float('avanceTotal'); -->
     <button type="submit" class="btn btn-primary">Grabar</button>
    </form>
      </div>
    </div>
  </div>
</div>﻿
</template> 

<script>
	import EventBus from '../event-bus';
	export default {
		data() {
			return {
				codigo: null,
				tipo: null,
				nivel: null,
				veta: null,
				ancho: null,
				alto: null
			}
		},
		methods: {
			saveLabor: function() {
				console.log('enviando');
				axios.post('http://127.0.0.1:8000/labors', {
					codigo: this.codigo,
					tipo: this.tipo,
					nivel: this.nivel,
					veta: this.veta,
					ancho: this.ancho,
					alto: this.alto
				})
				.then(function (response) {
					$('#addLabor').modal('hide')
					EventBus.$emit('labor-added', response.data.labor)
				})
				.catch(function(error) {
					console.log(error)
				});
				
			}
		}
	}
</script>

<style>
	
</style>