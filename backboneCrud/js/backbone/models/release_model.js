var Release_model = Backbone.Model.extend({
    defaults: {release_id: "0", release_name: "Release Name", upc: "7894560", release_date: '2013-10-24'},
    sync: function(method, model, options)
    {
        options.url = this.build_param(method);
        return Backbone.sync.apply(this, arguments);
    },
    initialize: function() {
        if (this.get('release_id') === "0")
            this.set('release_id', this.cid);
    },
    build_param: function(method)
    {
        var response = {};
        switch (method)
        {
            case "delete":
                return "?action=delete&" + $.param({"release_id": this.get("release_id")});

            case "update":
                that = this;
                release_id = {release_id: this.get("release_id")};
                _.extend(response, release_id, {"release_name": that.get("release_name")}, {"upc": that.get("upc")});
                return "?action=add&" + $.param(response);
            case "create":
                that = this;
                _.extend(response, {"release_name": that.get("release_name")}, {"upc": that.get("upc")}, {'release_date': that.get("release_date")});
                return "?action=add&" + $.param(response);
        }
    }
});