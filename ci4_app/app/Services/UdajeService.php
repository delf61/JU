<?php

namespace App\Services;

use App\Models\UdajeModel;

class UdajeService
{
    protected $udajeModel;

    public function __construct()
    {
        $this->udajeModel = new UdajeModel();
    }

    public function getUdaje(): ?array
    {
        $result = $this->udajeModel->first();
        return $result ? $result : null;
    }

    public function updateUdaje(array $data): array
    {
        $current = $this->getUdaje();

        if ($current === null) {
            // If empty, insert the first row. We don't have PK, so we just insert.
            if ($this->udajeModel->insert($data)) {
                return ['success' => true];
            }
        } else {
            // Update the single row. Since CI4 requires a PK for update(), and we don't have one,
            // we can use a query builder update directly without a where clause (since it's a 1-row table).
            $db = \Config\Database::connect();
            $builder = $db->table('udaje');
            if ($builder->update($data)) {
                return ['success' => true];
            }
            return ['success' => false, 'errors' => ['Failed to update udaje']];
        }

        return ['success' => false, 'errors' => $this->udajeModel->errors()];
    }
}
