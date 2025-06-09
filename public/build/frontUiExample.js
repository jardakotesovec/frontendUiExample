(function(vue) {
  "use strict";
  const _export_sfc = (sfc, props) => {
    const target = sfc.__vccOpts || sfc;
    for (const [key, val] of props) {
      target[key] = val;
    }
    return target;
  };
  const _sfc_main = {
    __name: "FuiHelloWorld",
    props: { fuiData: { type: String, required: true } },
    setup(__props) {
      const props = __props;
      const fuiDataParsed = JSON.parse(props.fuiData);
      return (_ctx, _cache) => {
        return vue.openBlock(), vue.createElementBlock(vue.Fragment, null, [
          vue.createElementVNode("div", null, vue.toDisplayString(vue.unref(fuiDataParsed).titleLabel), 1),
          vue.createElementVNode("ul", null, [
            (vue.openBlock(true), vue.createElementBlock(vue.Fragment, null, vue.renderList(vue.unref(fuiDataParsed).itemsList, (item) => {
              return vue.openBlock(), vue.createElementBlock("li", null, vue.toDisplayString(item), 1);
            }), 256))
          ])
        ], 64);
      };
    }
  };
  const FuiHelloWorld = /* @__PURE__ */ _export_sfc(_sfc_main, [["__scopeId", "data-v-2b48f91b"]]);
  console.log(FuiHelloWorld);
  const app = vue.createApp();
  app.component("FuiHelloWorld", FuiHelloWorld);
  app.mount("#FUIhellowWorld");
})(pkp.modules.vue);
