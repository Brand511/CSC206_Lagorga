<?php
class news
{
    /**
     * Pass in an array of stories to render
     *
     * @param $data
     */
    public static function stories($data)
    {
        foreach ( $data as $story ) {
            Self::story($story);
        }
    }
    /**
     * Render a single story
     *
     * @param $data
     */
    public static function story($data)
    {
        $title = $data['title'];
        $content = $data['content'];
        $image = '/assets/img/' . $data['image'];
        //$author = $data['firstName'] . ' ' . $data['lastName'];

        echo <<<story
        <div class="top10">
        <h2>$title</h2>
        <img src="$image" width="150">
        <p>$content</p>
        
    </div>    
story;
    }
    /**
     * Create the header to a table using the column names as the
     * titles of the column
     * @param $data
     * @return string
     */
    public static function buildTableHeader($data)
    {
        // Start building the table
        $table = '<table class="table table-hover">';
        // Create the table header row
        $header = '<tr>';
        foreach ( $data[ 0 ] as $key => $cell ) {
            $header .= '<th>' . $key . '</th>';
        }
        $header .= '</tr>';
        // Add the header to the table
        $table .= $header;
        return $table;
    }
    /**
     * Close out the table
     * @return string
     */
    public static function closeTable()
    {
        // Close out the table
        $table = '</table>';
        return $table;
    }
    /**
     * Loop through a data row and create the table cells
     * @param $row
     * @return string
     */
    public static function buildTableRow($row)
    {
        // Loop through each cell to build a row of data
        $rowHTML = '<tr>';
        // Loop through each cell and create the cells
        foreach ( $row as $cell ) {
            $rowHTML .= '<td>' . $cell . '</td>';
        }
        $rowHTML .= '</tr>';
        return $rowHTML;
    }
}