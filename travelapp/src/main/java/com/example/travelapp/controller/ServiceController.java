package com.example.travelapp.controller;

import com.example.travelapp.model.Service;
import com.example.travelapp.model.Tax;
import com.example.travelapp.service.CategoryService;
import com.example.travelapp.service.ServiceService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;

@RestController
@RequestMapping("/service")
@CrossOrigin
public class ServiceController {
    @Autowired
    private ServiceService serviceService;
    @GetMapping
    public ResponseEntity<?> getListService(){
        List<Service> services= serviceService.getAllService();
        return ResponseEntity.ok(services);
    }
}
