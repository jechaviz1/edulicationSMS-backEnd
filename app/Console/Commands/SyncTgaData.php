<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\TgaService;
use App\Models\Course;
use App\Models\UnitOfCompetency;
use DB;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;


class SyncTgaData extends Command
{
    protected $signature = 'tga:sync';
    protected $description = 'Sync data from Training.gov.au';
    protected $tgaService;

    public function __construct(TgaService $tgaService)
    {
        parent::__construct();
        $this->tgaService = $tgaService;
    }

    public function handle()
    {
        $startTime = microtime(true); // Start measuring execution time

        DB::beginTransaction();
        try {
            $lastSync = $this->getLastSyncTime();
            $currentSync = now()->format('Y-m-d\TH:i:s');

            $totalRecords = $this->tgaService->getTotalRecords($lastSync, $currentSync);
            dd($totalRecords);

            if ($totalRecords === null) {
                // Handle the error appropriately (e.g., log, retry later)
                $this->error("Failed to get total records from TGA API.");
                return;
            }

            $pageSize = config('tga.page_size', 1000); // Use config for page size
            $totalPages = ceil($totalRecords / $pageSize);

            for ($page = 1; $page <= $totalPages; $page++) {
                $courses = $this->tgaService->getCoursesByModifiedDate($lastSync, $currentSync, $page, $pageSize);

                if ($courses && isset($courses['TrainingComponent'])) { // Check if courses exist
                    foreach ($courses['TrainingComponent'] as $course) {
                        $courseData = $this->tgaService->getCourseData($course['TrainingComponentId']);

                        if ($courseData) { // Check if courseData is retrieved
                            $this->processCourseData($course, $courseData);
                        } else {
                            $this->warn("Failed to fetch details for course ID: " . $course['TrainingComponentId']);
                        }
                    }
                } elseif ($courses && isset($courses['SearchResults']['Message'])) {
                    $this->warn("No courses found for the specified date range.");
                } else {
                    $this->error("Invalid response structure from TGA API.");
                }

                $this->info("Processed page $page of $totalPages");
                $delay = config('tga.delay', 1); // Use config for delay
                sleep($delay);
            }

            DB::commit();
            $this->updateLastSyncTime($currentSync);
            $endTime = microtime(true);
            $executionTime = ($endTime - $startTime);
            $this->info("TGA data synced successfully in " . round($executionTime, 2) . " seconds.");

        } catch (Exception $e) {
            DB::rollBack();
            $this->error('Error syncing data: ' . $e->getMessage());
        }
    }


    protected function processCourseData($course, $courseData)
    {
        $courseId = $course['TrainingComponentId'];

        Course::updateOrCreate(
            ['course_id' => $curseId],
            [
                'name' => $courseData['TrainingComponent']['Name'] ?? null,
                'code' => $courseData['TrainingComponent']['Code'] ?? null,
                'description' => $courseData['TrainingComponent']['Description'] ?? null,
            ]
        );

        // Sync Units of Competency (adapt based on the actual structure of $courseData)
        $this->syncUnitsOfCompetency($courseId, $courseData['TrainingComponent']['Units'] ?? [], 'core'); // Example
        $this->syncUnitsOfCompetency($courseId, $courseData['TrainingComponent']['ElectiveUnits'] ?? [], 'elective'); // Example
    }

    protected function syncUnitsOfCompetency($courseId, $units, $type)
    {
        if ($units && is_array($units)) { // Check if $units is an array
            foreach ($units as $unit) {
                if (is_array($unit)) { // Check if $unit is an array
                    foreach ($unit as $u) { // Iterate through each unit
                        UnitOfCompetency::updateOrCreate(
                            ['unit_id' => $u['UnitOfCompetency']['UnitCode'] ?? null], // Access UnitCode correctly
                            [
                                'course_id' => $courseId,
                                'name' => $u['UnitOfCompetency']['Name'] ?? null, // Access Name correctly
                                'code' => $u['UnitOfCompetency']['UnitCode'] ?? null, // Access UnitCode correctly
                                'description' => $u['UnitOfCompetency']['Description'] ?? null, // Access Description correctly
                                'type' => $type
                            ]
                        );
                    }
                }
            }
        }
    }


    protected function getLastSyncTime()
    {
        return Cache::get('tga.last_sync_time', Carbon::parse('2000-01-01T00:00:00')); // Default to a very old date
    }


    protected function updateLastSyncTime($currentSync)
    {
        return Cache::forever('tga.last_sync_time', Carbon::parse($currentSync));
    }
}

