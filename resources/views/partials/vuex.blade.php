<script>
let store = {
    state: {
        user: <?php if (auth()->user()) {
                echo json_encode(auth()->user());
                } else {
                echo 'null,';
              } ?>
    },
    mutations: {
        // example(state, item) {},
    },

    actions: {
        // example({commit, state, dispatch, getters}, {props}),
    },
    getters: {
        // example(state) {}
    }
};
window._STORE = store;
</script>