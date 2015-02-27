var release_model = Backbone.Model.extend({
	defaults: {release_id: "0", release_name: "", upc: "", release_date: '', release_status:'label_processing'},
	sync: function(method, model, options)
    {
        options.url = this.build_param(method);
        return Backbone.sync.apply(this, arguments);
    },
	build_param: function(method){
		var response = {};
        switch (method){
			case "create":
                that = this;
                _.extend(response, {"release_name": that.get("release_name")}, {"upc": that.get("upc")}, {'release_date': that.get("release_date")}, {"release_status": that.get('release_status')});
                return "?action=add&" + $.param(response);
			case "update":
                that = this;
                release_id = {release_id: this.get("release_id")};
                _.extend(response, release_id, {"release_name": that.get("release_name")}, {"upc": that.get("upc")}, {"release_date": that.get("release_date")});
                return "?action=add&" + $.param(response);
			case "delete":
                return "?action=delete&" + $.param({"release_id": this.get("release_id")});
		}
	
	}
});