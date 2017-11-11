<?php

namespace UAI\DAO\Libs;

class Atributes {

    public function createFields($atributes) {
        return implode(',', array_keys($atributes));
    }

    public function createValues($atributes) {
        return ':' . implode(',:', array_keys($atributes));
    }

    public function bindCreateParamenters($atributes) {
        $values = $this->createValues($atributes);
        $exValues = explode(',', $values);
        $bindParameters = array_combine($exValues, array_values($atributes));

        return $bindParameters;
    }

    /// updates
    private function combineUpdateFields($atributes) {

        $key = array_keys($atributes);
        $spdp = ':' . implode('=:', $key);
        $combine = array_combine($key, explode('=', $spdp));

        return $combine;
    }

    public function updateFields($atributes) {

        $combine = $this->combineUpdateFields($atributes);
        $query = NULL;

        foreach ($combine as $key => $value) {

            $query .= $key . '=' . $value . ',';
        }

        $novaQuery = rtrim($query, ',');
        return $novaQuery;
    }

    public function bindUpdateParamenters($atributes) {

        $keys = array_keys($atributes);
        $spdp = ':' . implode('=:', $keys);
        $combine = array_combine(explode(',', $spdp), array_values($atributes));

        return $combine;
    }

    public function createWhere($atributes) {

        $keys = array_keys($atributes);
        $values = array_values($atributes);
        $combine = array_combine($keys, $values);
        $where = 'WHERE TRUE';

        foreach ($combine as $key => $value) {
            $where .= ' AND ' . $key . '="' . $value . '"';
        }
        return $where;
    }

}
