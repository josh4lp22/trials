// The main view of the application
var App = Backbone.View.extend({
	// Base the view on an existing element
	el: $('#main'),
	initialize: function(){
		this.total = $('#total span');
		this.list = $('#services');
		this.listenTo(services, 'change', this.render);

		services.each(function(service){
			var view = new ServiceView({ model: service });
			this.list.append(view.render().el);
		}, this);
	},

	render: function(){
		var total = 0;

		_.each(services.getChecked(), function(elem){
			total += elem.get('price');
		});
		// Update the total price
		this.total.text('$'+total);
		return this;
	}

});

