<?php
/*
 * PHPFaker WordPress plugin.
 *
 * Copyright (c) 2012, Itart.
 */


/**
 * Invokes a method on the generator.
 *
 * @param string $generator Generator name
 * @param string $method Method name
 * @param array $params An array of arguments to the method of the generator
 * @param bool $echo The flag to display the results
 * @return mixed
 */
function faker_generate($generator, $method, $params = array(), $echo = false) {
    $result = call_user_func_array(array(Faker::getFaker()->getGenerator($generator), $method), (array) $params);

    if ($echo)
        echo $result;

    return $result;
}

/**
 * Returns the generator instance.
 *
 * @param string $generator Generator name
 * @return \PHPFaker\Generator\AbstractGenerator Generator instance
 */
function faker_generator($generator) {
    return Faker::getFaker()->getGenerator($generator);
}

/**
 * Generates a string context, throwing an exception.
 *
 * @access private
 *
 * @param Exception $exception Exception instance
 * @return string
 */
function _faker_exception_context(Exception $exception) {
    $context_radius = 5;
    $file = $exception->getFile();
    $line_number = $exception->getLine();
    $context = array();
    $i = 0;
    foreach(file($file) as $line) {
        $i++;
        if($i >= $line_number - $context_radius && $i <= $line_number + $context_radius) {
            if ($i == $line_number) {
                $context[] = ' >>'. $i ."\t". $line;
            } else {
                $context[] = '   '. $i ."\t". $line;
            }
        }
        if($i > $line_number + $context_radius) break;
    }
    return "\n". implode('', $context);
}

/**
 * Formats the exception into a readable HTML format.
 *
 * @param Exception $exception
 * @return string
 */
function faker_exception_format(Exception $exception) {

    $message = nl2br($exception->getMessage());
    $context = _faker_exception_context($exception);
    $result = <<<HTML
          <style>
            body { background-color: #fff; color: #333; }
            body, p, ol, ul, td { font-family: verdana, arial, helvetica, sans-serif; font-size: 13px; line-height: 25px; }
            pre { background-color: #eee; padding: 10px; font-size: 11px; line-height: 18px; }
            a { color: #000; }
            a:visited { color: #666; }
            a:hover { color: #fff; background-color:#000; }
            div#Trace { overflow: hidden; }
            div#Trace:hover { overflow: visible; }
    	 </style>
          <script>
          function TextDump() {
            w = window.open('', "Error text dump", "scrollbars=yes,resizable=yes,status=yes,width=1000px,height=800px,top=100px,left=100px");
            w.document.write('<html><body>');
            w.document.write('<h1>' + document.getElementById('Title').innerHTML + '</h1>');
            w.document.write(document.getElementById('Context').innerHTML);
            w.document.write(document.getElementById('Trace').innerHTML);
            w.document.write(document.getElementById('Request').innerHTML);

            w.document.write('</body></html>');
            w.document.close();
          }
          </script>
        <div style="width:99%; position:relative">
        <h2 id='Title'>{$message}</h2>
        <a href="#" onclick="TextDump(); return false;">Raw dump</a>
        <div id="Context" style="display: block;"><h3>Error with code {$exception->getCode()} in '{$exception->getFile()}' around line {$exception->getLine()}:</h3><pre>{$context}< /pre></div>
        <div id="Trace"><h2>Call stack</h2><pre>{$exception->getTraceAsString()}</pre></div>
        <div id="Request"><h2>Request</h2><pre>
HTML;
    $result .= var_export($_REQUEST, true);
    $result .= "</pre></div></div>";
    return $result;
}
