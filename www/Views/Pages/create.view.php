<head>
<link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet">
    <script src="https://unpkg.com/grapesjs@0.21.2/dist/grapes.min.js"></script>
</head>
<h1>Create a new page</h1>

<!-- The form fields will go here -->
<?php $this->partial("form", $form, $formErrors); ?>

<div id="gjs">
</div>
<div id="blocks"></div>
<input type="hidden" id="content-input" name="content" />

<script src="https://unpkg.com/grapesjs"></script>

<script type="text/javascript">
     const editor = grapesjs.init({
            container: "#gjs",
            fromElement: true,
            //width: "auto",
            storageManager: false,
            plugins: ["gjs-preset-webpage"],
            pluginsOpts: {
                "gjs-preset-webpage": {},
            },
            blockManager: {
                appendTo: "#blocks",
                blocks: [
                    {
                        id: "section", // id is mandatory
                        label: "<b>Section</b>", // You can use HTML/SVG inside labels
                        attributes: { class: "gjs-block-section" },
                        content:
                            '<section><h1>This is a simple title</h1><div>This is just a Lorem text: Lorem ipsum dolor sit amet</div></section>',
                    },
                    {
                        id: "text",
                        label: "Text",
                        content: '<div data-gjs-type="text">Insert your text here</div>',
                    },
                    {
                        id: "image",
                        label: "Image",
                        // Select the component once it's dropped
                        select: true,
                        // You can pass components as a JSON instead of a simple HTML string,
                        // in this case we also use a defined component type `image`
                        content: { type: "image" },
                        // This triggers `active` event on dropped components and the `image`
                        // reacts by opening the AssetManager
                        activate: true,
                    },
                ],
            },
        });

        var content_first = editor.getHtml();
        document.getElementById("content-input").value = content_first;
        editor.on("change:changesCount", ( ) => {
            content = editor.getHtml();
            document.getElementById("content-input").value = content;
        });

    //rajoute des blocs de base text, image comme ça :
    /*  */

    
</script>

</form>