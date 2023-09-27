<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite('resources/js/app.js')
    @inertiaHead
  </head>
  <body>
    
    {{-- <div id="app" data-page="{{ json_encode($page) }}"></div> --}}
    @inertia
{{-- <div id= "app">
    <App></App>
</div>
    <script src="{{ mix('js/main.js') }}"></script> --}}

{{-- 
    <button onclick="triggerVueButtonClick()">Trigger Vue Button Click</button>

    <script>
        function triggerVueButtonClick() {
            // Use Inertia's page() method to interact with Vue component
            const buttonComponent = Inertia.page().$refs.buttonComponent;
            
            // Call the method in the Vue component
            buttonComponent.handleButtonClick();
        }

     </script>   
 --}}

    
    {{-- <router-link to="/page-a">Go to Page A</router-link> --}}

  </body>
</html> 