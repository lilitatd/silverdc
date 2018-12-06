<template>
	<div class="row">
		<spinner v-show="loading"></spinner>
		<div class="col-sm" v-for="labor in labors">
			<div class="card" style="width: 18rem; margin-top: 70px;">
				<div class="card-header">{{ labor.codigo }}</div>
				<div class="card-body">
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Tipo: {{ labor.tipo }}</li>
						<li class="list-group-item">Nivel: {{ labor.nivel }}</li>
						<li class="list-group-item">Veta: {{ labor.veta }}</li>
						<li class="list-group-item">Ancho: {{ labor.ancho }}</li>
						<li class="list-group-item">Alto: {{ labor.alto }}</li>
					</ul>
					<a href="/labors/" class="btn btn-primary">Ver mas...</a>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import EventBus from '../event-bus';

	export default {
		data(){
			return {
				labors: [],
				loading: true
			}
		},
		created() {
			EventBus.$on('labor-added', data => {
				this.labors.push(data)
			})
		},
		mounted() {
			axios
				.get('http://127.0.0.1:8000/labors')
				.then((response) => {
					this.labors = response.data
					this.loading = false;
				})
		}
	}
</script>