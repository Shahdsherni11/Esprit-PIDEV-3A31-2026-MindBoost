<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HolidayService
{
    public function __construct(private HttpClientInterface $httpClient)
    {
    }

    public function getUpcoming(string $countryCode = 'TN', ?int $year = null): array
    {
        $year = $year ?? (int) date('Y');

        try {
            $response = $this->httpClient->request(
                'GET',
                sprintf('https://date.nager.at/api/v3/publicholidays/%d/%s', $year, $countryCode),
                ['timeout' => 15]
            );

            $data = $response->toArray(false);
            $today = date('Y-m-d');
            $filtered = [];

            foreach ($data as $holiday) {
                if (($holiday['date'] ?? '') >= $today) {
                    $filtered[] = [
                        'date' => $holiday['date'] ?? '',
                        'name' => $holiday['localName'] ?? ($holiday['name'] ?? 'Jour ferie'),
                    ];
                }
            }

            return array_slice($filtered, 0, 5);
        } catch (ExceptionInterface|\Throwable $e) {
            return [
                ['date' => '2026-05-01', 'name' => 'Fete du Travail'],
                ['date' => '2026-07-25', 'name' => 'Fete de la Republique'],
                ['date' => '2026-08-13', 'name' => 'Fete de la Femme'],
            ];
        }
    }
}
