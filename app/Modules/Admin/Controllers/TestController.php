<?php

namespace app\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function showResults()
    {
        $xmlFile = storage_path('logs/phpunit.xml');
        $xml = simplexml_load_file($xmlFile);

       
        $testCases = $this->extractTestCases($xml);
        return view('admin::test-results', ['testCases' => $testCases]);

    }

    private function extractTestCases($xml)
    {
        $testCases = [];

        // Helper function to extract test cases from a testsuite
        $extractFromSuite = function ($suite) use (&$testCases, &$extractFromSuite) {
            foreach ($suite->testsuite as $innerSuite) {
                $extractFromSuite($innerSuite);
            }

            foreach ($suite->testcase as $case) {
                $testCases[] = [
                    'name' => (string) $case['name'],
                    'status' => $case->failure ? 'Failed' : ($case->error ? 'Error' : 'Passed'),
                    'file' => (string) $case['file'],
                    'line' => (string) $case['line']
                ];
            }
        };

        $extractFromSuite($xml);

        return $testCases;
    }
}


?>