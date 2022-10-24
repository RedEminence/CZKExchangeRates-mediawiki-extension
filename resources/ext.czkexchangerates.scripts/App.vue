<template>
	<div>
		<div v-if="store.loading">
			<div class="lds-dual-ring"></div>
		</div>
		<p class="error" v-if="error">{{ error }}</p>
		<div v-html="ratesTable"></div>
		<p v-html="updatedAt"></p>
	</div>
</template>
<script>
const store = require('./store.js');

module.exports = exports = Vue.defineComponent( {
	name: 'App',
	data: function() {
		return {
			store,
			updatedAt: null,
			ratesTable: null,
			error: null
		};
	},
	methods: {
		updateRates: function() {
			new mw.Rest().get('/czkexchangerates/v1/czk-exchange-rates').done((response) => {
				store.loading = false;
				if (response.success) {
					const data = response.data
					this.ratesTable = this.buildTable(data.rates);
					this.updatedAt = `Data was updated at: ${this.formatDate(new Date(data.updated_at))}`;
				} else {
					this.error = response.error;
				}
			});
		},
		buildTable: function (rates) {
			let currenciesHtml = '';
			for (let [currency, rate] of Object.entries(rates)) {
				currenciesHtml += `<tr><td>${currency}</td><td>${rate}</td></tr>`;
			}

			return `<table>
					<tr>
						<th>Pair</th>
						<th>Rate</th>
					</tr>
						${currenciesHtml}
				</table>`;
		},
		formatDate: function (date) {
			const minutes = date.getMinutes();
			const formattedMinutes = minutes < 10 ? `0${minutes}` : minutes;
			return `${date.getFullYear()}-${date.getMonth()+1}-${date.getDate()} ${date.getHours()}:${formattedMinutes}`;
		}
	},

	mounted: function() {
		this.updateRates();
		setInterval(this.updateRates, 60000);
	}
});
</script>
<style>
td, th {
	border: 1px solid #dddddd;
	text-align: left;
	padding: 8px;
}

.lds-dual-ring {
	display: inline-block;
	width: 80px;
	height: 80px;
}
.lds-dual-ring:after {
	content: " ";
	display: block;
	width: 64px;
	height: 64px;
	margin: 8px;
	border-radius: 50%;
	border: 6px solid #000;
	border-color: #000 transparent #000 transparent;
	animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
	0% {
		transform: rotate(0deg);
	}
	100% {
		transform: rotate(360deg);
	}
}
</style>
