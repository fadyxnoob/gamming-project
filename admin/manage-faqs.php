<?php 
    include('include\header.php');
    include('include\sidebar.php');
    
        $faqs = $row = $serial ='';
        $myObj->sql("SELECT * FROM manage_faqs");
        $data   = $myObj->getResult();
        if($data > 0){
            $serial = 0;
            foreach($data as $row){
                $serial        = $serial + 1;
                $faq_id        = $row['id'];
                $question      = $row['question'];
                $answer        = $row['answer'];
    
                $faqs .='<tr>
                    <td>'.$serial.'    </td>
                    <td>'.$question.'  </td>
                    <td>'.$answer.'    </td>
                    <td>
                        <a href="update-faq.php?faq_id='.$faq_id.'"class="btn bg-info">
                            <i class="fa-regular fa-pen-to-square "></i>
                        </a>
                    </td>
                </tr>';
            }
        }
        
?>
<!-- ===== MAIN START ===== -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Manage FAQs</li>
        </ol>
        <div class="row">
            <div class="col text-end mb-3">
                <a href="add-faq.php" type="button" class="SignUp-Btn text-decoration-none">
                    <span data-feather="calendar"></span>
                    Add Faqs
                </a>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Question</th>
                                <th scope="col">Answer</th>
                                <th scope="col">Edit</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $faqs; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>
<!-- ===== MAIN END ===== -->
<?php include('include\footer.php'); ?>