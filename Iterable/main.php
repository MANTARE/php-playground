<?php
// Any properties could be accessed by foreach
class Insect
{
    public string $weevils = 'ゾウムシ';
    public string $damselflies = 'イトトンボ';
    public string $mantis = 'カマキリ';

    public function FunctionName(string $var = 'test')
    {
        echo $var;
    }
}

$bugs = new Insect();
foreach ($bugs as $kinds) {
    echo "the JP name: {$kinds}. \n";
}


// Basic example how to use Generator
$getInsects = function (): Generator {
    yield 'weevils';
    yield 'damselflies';
    yield 'mantis';
};

$insects = $getInsects();

assert(assertion: $insects instanceof Iterator);

foreach ($insects as $insect) {
    echo "My favorite insect is {$insect} . \n";
}
