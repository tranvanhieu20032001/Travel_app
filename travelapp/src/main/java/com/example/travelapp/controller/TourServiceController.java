package com.example.travelapp.controller;
import com.example.travelapp.model.TourService;
import com.example.travelapp.service.TourServiceService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/tourservice")
@CrossOrigin
public class TourServiceController {
    @Autowired
    private TourServiceService tourServiceService;
    @GetMapping
    public ResponseEntity<?> getListTourService(){
        List<TourService> tours= tourServiceService.getAllTourService();
        return ResponseEntity.ok(tours);
    }
    @GetMapping("/{id_tour}")
    public ResponseEntity<?> getTourService(@PathVariable Long id_tour){
        List<TourService> tours= tourServiceService.getTourServiceByIdTour(id_tour);
        return ResponseEntity.ok(tours);
    }
    @PostMapping("/create")
    public ResponseEntity<?> create(@RequestBody TourService tourService){
        return  new ResponseEntity<>(tourServiceService.save(tourService),HttpStatus.OK);
    }
    @PostMapping("/createorupdate")
    public ResponseEntity<?> createOrUpdate(@RequestBody TourService tourService){

        return  new ResponseEntity<>(tourServiceService.updateOrSave(tourService),HttpStatus.OK);
    }
    @DeleteMapping("/delete/{id}")
    public ResponseEntity<?> delete(@PathVariable Long id)
    {
        tourServiceService.deleteAll(id);
        return new ResponseEntity<>(HttpStatus.OK);
    }


}
