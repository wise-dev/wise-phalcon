
{% if dispatcher.getControllerName() != "connexion" and dispatcher.getControllerName() != "errors" %}
{{ flash.output() }}
{{ partial("layouts/menu") }}
{% else %}
{{ flash.output() }}
{{ content() }}
{% endif  %}
