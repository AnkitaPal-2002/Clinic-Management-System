<?php 
    include ('../auth.php');
    include('../../hooks/useParams.php');
    checkAccess('Patient', getHostURL());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient | Department List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="max-w-6xl mx-auto">
    <?php
    
    include ('../../components/departmentCard.php');

    $specialities = [
        [
            "title" => "Anesthesiologists",
            "description" => "Anesthesiologists specialize in pain relief and the care of patients before, during, and after surgery. They monitor vital signs and ensure comfort during medical procedures.",
            "url" => getHostURL()."/auth/patient/specialities/specialist.php?cat=Anesthesiologists"
        ],
        [
            "title" => "Cardiologists",
            "description" => "Cardiologists focus on diagnosing and treating conditions of the heart and blood vessels. They help patients manage heart disease and cardiovascular health.",
            "url" => getHostURL()."/auth/patient/specialities/specialist.php?cat=Cardiologists"
        ],
        [
            "title" => "Colon and Rectal Surgeons",
            "description" => "These surgeons specialize in treating disorders of the colon, rectum, and anus. They perform surgeries to address conditions such as colorectal cancer and inflammatory bowel diseases.",
            "url" => getHostURL()."/auth/patient/specialities/specialist.php?cat=Colon_and_Rectal_Surgeons"
        ],
        [
            "title" => "Critical Care Medicine Specialists",
            "description" => "Critical care specialists provide advanced care for patients with life-threatening conditions, often in intensive care units. They manage respiratory, cardiovascular, and organ support.",
            "url" => getHostURL()."/auth/patient/specialities/specialist.php?cat=Critical_Care_Medicine_Specialists"
        ],
        [
            "title" => "Dermatologists",
            "description" => "Dermatologists diagnose and treat conditions related to the skin, hair, and nails. They manage skin diseases, cosmetic concerns, and skin cancers.",
            "url" => getHostURL()."/auth/patient/specialities/specialist.php?cat=Dermatologists"
        ],
        [
            "title" => "Endocrinologists",
            "description" => "Endocrinologists specialize in hormone-related diseases and disorders. They treat conditions like diabetes, thyroid diseases, and metabolic imbalances.",
            "url" => getHostURL()."/auth/patient/specialities/specialist.php?cat=Endocrinologists"
        ],
        [
            "title" => "Emergency Medicine Specialists",
            "description" => "Emergency medicine specialists provide urgent care for acute illnesses and injuries. They stabilize patients in emergency rooms and make quick decisions under pressure.",
            "url" => getHostURL()."/auth/patient/specialities/specialist.php?cat=Emergency_Medicine_Specialists"
        ],
        [
            "title" => "Gastroenterologists",
            "description" => "Gastroenterologists diagnose and treat conditions related to the digestive system, including the stomach, intestines, and liver. They manage issues like GERD and digestive disorders.",
            "url" => getHostURL()."/auth/patient/specialities/specialist.php?cat=Gastroenterologists"
        ],
        [
            "title" => "Geriatric Medicine Specialists",
            "description" => "Geriatric specialists focus on the healthcare of elderly patients, managing conditions associated with aging, including dementia and osteoporosis.",
            "url" => getHostURL()."/auth/patient/specialities/specialist.php?cat=Geriatric_Medicine_Specialists"
        ],
        [
            "title" => "Hematologists",
            "description" => "Hematologists diagnose and treat disorders of the blood, including leukemia, anemia, and clotting disorders. They specialize in blood diseases and therapies.",
            "url" => getHostURL()."/auth/patient/specialities/specialist.php?cat=Hematologists"
        ],
        [
            "title" => "Nephrologists",
            "description" => "Nephrologists focus on kidney care and treating diseases of the kidneys. They manage conditions like chronic kidney disease and electrolyte imbalances.",
            "url" => getHostURL()."/auth/patient/specialities/specialist.php?cat=Nephrologists"
        ],
        [
            "title" => "Neurologists",
            "description" => "Neurologists specialize in the treatment of disorders of the nervous system, including the brain and spinal cord. They manage conditions like epilepsy and Parkinson’s disease.",
            "url" => getHostURL()."/auth/patient/specialities/specialist.php?cat=Neurologists"
        ],
        [
            "title" => "Obstetricians and Gynecologists",
            "description" => "Obstetricians and gynecologists provide care related to women's reproductive health, including pregnancy, childbirth, and gynecological disorders.",
            "url" => getHostURL()."/auth/patient/specialities/specialist.php?cat=Obstetricians_and_Gynecologists"
        ]
    ];
    
    ?>


    <header>
        <?php include ('../../components/navigation.php') ?>
    </header>
    <section>
        <h1 class="text-2xl my-4 font-bold underline cursor-default">List of different Doctor's category</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 p-4">
    
        <?php
        foreach ($specialities as $speciality) {
            echo "<div class='flex items-center justify-center bg-gray-100 p-4 rounded-lg hover:shadow-2xl'>";
            // Pass title, description, and url to the departmentCard function
            departMentCard($speciality['title'], $speciality['description'], $speciality['url']);
            echo "</div>";
        }
    
        ?>
        </div>
    </section>
</body>
</html>
